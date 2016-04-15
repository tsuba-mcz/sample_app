<?php

class Profile extends AppModel
{
    public $name = 'Profile';
    public $useTable = 'profiles';

    const MIN_STAFF_NO = 5;     // 社員番号の最小値
    const NUMBER_OF_DIGIT = 10; // 桁数

    public $validate = [
        'user_id' => [
            'req' => [
                'rule' => 'notBlank',
                'required' => true,
                'message' => 'この項目は必須です',
            ],
        ],
        'profile_name' => [
            'req' => [
                'rule' => 'notBlank',
                'required' => true,
                'message' => 'この項目は必須です',
            ],
        ],
        'phonetic' => [
            'req' => [
                'rule' => 'notBlank',
                'required' => true,
                'message' => 'この項目は必須です',
            ],
            'kana' => [
                'rule' => ['custom', '/^[ァ-ン\x20]+$/u'],
                'message' => '指定された形式で入力してください',
            ],
        ],
        'initial' => [
            'req' => [
                'rule' => 'notBlank',
                'required' => true,
                'message' => 'この項目は必須です',
            ],
            'ini' => [
                'rule' => ['custom', '/^[A-Z\x20]+$/u'],
                'message' => '指定された形式で入力してください',
            ],
        ],
        'gender' => [
            'req' => [
                'rule' => 'notBlank',
                'required' => true,
                'message' => 'この項目は必須です',
            ],
        ],
        'birth_year' => [
            'req' => [
                'rule' => 'notBlank',
                'required' => true,
                'message' => 'この項目は必須です',
            ],
        ],
        'birth_month' => [
            'req' => [
                'rule' => 'notBlank',
                'required' => true,
                'message' => 'この項目は必須です',
            ],
        ],
        'birth_day' => [
            'req' => [
                'rule' => 'notBlank',
                'required' => true,
                'message' => 'この項目は必須です',
            ],
        ],
        'simple_address' => [
            'req' => [
                'rule' => 'notBlank',
                'required' => true,
                'message' => 'この項目は必須です',
            ],
        ],
        'detail_address' => [
            'req' => [
                'rule' => 'notBlank',
                'required' => true,
                'message' => 'この項目は必須です',
            ],
        ],
        'near_station' => [
            'req' => [
                'rule' => 'notBlank',
                'required' => true,
                'message' => 'この項目は必須です',
            ],
        ],
        'school' => [
            'req' => [
                'rule' => 'notBlank',
                'required' => true,
                'message' => 'この項目は必須です',
            ],
        ],
        'graduation_year' => [
            'req' => [
                'rule' => 'notBlank',
                'required' => true,
                'message' => 'この項目は必須です',
            ],
        ],
    ];

    public $belongsTo = [
        'User' => [
            'className' => 'User',
            'foreignkey' => 'id',
        ],
    ];

    /**
     * 生年月日整形
     */
    public function fairingBirth($year = null, $month = null, $day = null) {
        if($year === NULL || $month === NULL || $day === NULL) {
            return false;
        }

        // 月、日にちが1桁の場合は先頭に0をつける
        if($month < self::NUMBER_OF_DIGIT) {
            $month = '0' . $month;
        }

        if($day < self::NUMBER_OF_DIGIT) {
            $day = '0' . $day;
        }

        // DBの指定形式へ整形
        $birth = $year . '-' . $month . '-' . $day;

        return $birth;
    }

    /**
     * 生年月日分解
     */
    public function breakBirth($birth) {
        return explode('-', $birth);
    }
}