<?php

App::uses('AuthComponent', 'Controller/Component');

class User extends AppModel
{
    public $name = 'User';
    public $useTable = 'users';

    const MAX_STAFF_NO = 5;  // 社員番号の最大値
    const MIN_STAFF_NO = 5;  // 社員番号の最小値
    const MAX_PASSWORD = 16; // パスワード最大値
    const MIN_PASSWORD = 7;  // パスワード最小値

    public $validate = [
        'staff_no' => [
            'req' => [
                'rule' => 'notBlank',
                'required' => true,
                'message' => 'この項目は必須です',
            ],
            'num' => [
                'rule' => 'numeric',
                'message' => '指定された形式で入力してください',
            ],
            'min' => [
                'rule' => ['minLength', self::MIN_STAFF_NO],
                'message' => '指定の文字数で入力してください',
            ],
            'uniq' => [
                'rule' => 'isUnique',
                'message' => '同一の番号が既に存在します',
            ],
        ],
        'fname' => [
            'req' => [
                'rule' => 'notBlank',
                'required' => true,
                'message' => 'この項目は必須です',
            ],
        ],
        'lname' => [
            'req' => [
                'rule' => 'notBlank',
                'required' => true,
                'message' => 'この項目は必須です',
            ],
        ],
        'fkana' => [
            'req' => [
                'rule' => 'notBlank',
                'required' => true,
                'message' => 'この項目は必須です',
            ],
            'kana' => [
                'rule' => ['custom', '/^[ァ-ン]+$/u'],
                'message' => '指定された形式で入力してください',
            ],
        ],
        'lkana' => [
            'req' => [
                'rule' => 'notBlank',
                'required' => true,
                'message' => 'この項目は必須です',
            ],
            'kana' => [
                'rule' => ['custom', '/^[ァ-ン]+$/u'],
                'message' => '指定された形式で入力してください',
            ],
        ],
        'email' => [
            'req' => [
                'rule' => 'notBlank',
                'required' => true,
                'message' => 'この項目は必須です',
            ],
            'mail' => [
                'rule' => 'email',
                'message' => '指定された形式で入力してください',
            ],
        ],
        'password' => [
            'req' => [
                'rule' => 'notBlank',
                'required' => true,
                'message' => 'この項目は必須です',
            ],
            'max' => [
                'rule' => ['maxLength', self::MAX_PASSWORD],
                'message' => '指定の文字数で入力してください',
            ],
            'min' => [
                'rule' => ['minLength', self::MIN_PASSWORD],
                'message' => '指定の文字数で入力してください',
            ],
            'sameTo' => [
                'rule' => 'sameTo',
                'message' => 'パスワードが一致しません',
            ],
        ],
        'password_confirm' => [
            'req' => [
                'rule' => 'notBlank',
                'required' => true,
                'message' => 'この項目は必須です',
            ],
            'sameTo' => [
                'rule' => 'sameTo',
                'message' => 'パスワードが一致しません',
            ],
        ],
    ];

    public function beforeSave($options = array()) {
        if(isset($this->data[$this->alias]['password'])) {
            $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
        }

        return true;
    }

    public function sameTo($check) {
        if($this->data['User']['password'] === $this->data['User']['password_confirm']) {
            return true;
        } else {
            return false;
        }
    }

}