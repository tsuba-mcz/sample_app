<?php

class SkilsController extends AppController
{
    public $uses = ['Profile', 'User'];
    public $helper = ['Session', 'Html', 'Form'];
    public $components = ['Session'];

    const YEAR_LIST = 60;  //過去年の指定
    const MONTH_LIST = 12; //月の指定
    const DAY_LIST = 31;   //日にちの指定

    /**
     * 経歴書一覧表示
     */
    public function index() {
        $this->set('title', __('経歴書登録者一覧'));
        $profiles = $this->Profile->find('all');
        $this->set('profiles', $profiles);
    }

    /**
     * スキル入力
     */
    public function input() {
        $this->set('title', __('スキル入力'));

        // userテーブルに登録されている社員番号をセット
        $staffs = $this->User->find('all', [
            'fields' => ['id', 'staff_no'],
        ]);
        foreach($staffs as $staff) {
            $staffNo[$staff['User']['id']] = $staff['User']['staff_no'];
        }
        $this->set('staffNo', $staffNo);
        $this->Session->write('staffNo', $staffNo);


        // 年リストセット
        $yearList = $this->yearList();
        $this->set('yearList', $yearList);
        $this->Session->write('yearList', $yearList);

        // 月リストセット
        $monthList = $this->monthList();
        $this->set('monthList', $monthList);
        $this->Session->write('monthList', $monthList);

        // 日にちリストセット
        $dayList = $this->dayList();
        $this->set('dayList', $dayList);
        $this->Session->write('dayList', $dayList);
    }

    /**
     * 入力確認
     */
    public function confirm() {
        $this->set('title', __('入力内容確認'));

        // postで遷移していなければ入力画面へリダイレクト
        if(!$this->request->is('post')) {
            $this->redirect(BASE_URL . 'skils/input');
        }

        // バリデーションチェック
        $profile = $this->request->data['Profile'];
        $this->Profile->set($profile);
        if(!$this->Profile->validates()) {
            $this->Session->setFlash(__('入力に誤りがあります'));
            $this->Profile->validationErrors;
            $this->set('staffNo', $this->Session->read('staffNo'));
            $this->set('yearList', $this->Session->read('yearList'));
            $this->set('monthList', $this->Session->read('monthList'));
            $this->set('dayList', $this->Session->read('dayList'));
            $this->render('input');
        }

        $user = $this->User->findById($this->request->data['Profile']['user_id'], ['field' => 'staff_no']);
        $this->set('userId', $user['User']['staff_no']);
        $this->set('data', $this->request->data);
    }

    /**
     * 入力内容登録
     */
    public function complete() {
        $this->set('title', __('入力内容登録'));
        // postで遷移していなければ入力画面へリダイレクト
        if(!$this->request->is('post')) {
            $this->redirect(BASE_URL . 'skils/input');
        }
        $profile = $this->request->data['Profile'];
        $birth = $this->Profile->fairingBirth($profile['birth_year'], $profile['birth_month'], $profile['birth_day']);
        if(!$birth) {
            $this->Session->setFlash(__('入力に誤りがあります'));
            $this->Profile->validationErrors['birth_year'] = __('この項目は必須です');
            $this->Profile->validationErrors['birth_month'] = __('この項目は必須です');
            $this->Profile->validationErrors['birth_day'] = __('この項目は必須です');
            $this->set('staffNo', $this->Session->read('staffNo'));
            $this->set('yearList', $this->Session->read('yearList'));
            $this->set('monthList', $this->Session->read('monthList'));
            $this->set('dayList', $this->Session->read('dayList'));
            $this->render('input');
        } else {
            unset($profile['birth_year']);
            unset($profile['birth_month']);
            unset($profile['birth_day']);
            $profile['birth'] = $birth;
        }

        // DBへ格納
        $this->Profile->set($profile);
        unset($this->Profile->validate['birth_year']);
        unset($this->Profile->validate['birth_month']);
        unset($this->Profile->validate['birth_day']);
        if($this->Profile->save()) {
            $this->Session->setFlash(__('プロフィールを登録しました'));
            $this->Session->delete('staffNo');
            $this->Session->delete('yearList');
            $this->Session->delete('monthList');
            $this->Session->delete('dayList');
            $this->redirect(BASE_URL . 'skils');
        } else {
            $this->Session->setFlash(__('入力に誤りがあります'));
            $this->Profile->validationErrors;
            $this->set('staffNo', $this->Session->read('staffNo'));
            $this->set('yearList', $this->Session->read('yearList'));
            $this->set('monthList', $this->Session->read('monthList'));
            $this->set('dayList', $this->Session->read('dayList'));
            $this->render('input');
        }
    }

    /**
     * 登録内容編集
     */
    public function edit($id = null) {
        if($id === NULL) {
            $this->redirect(BASE_URL . 'skils');
        }
        $this->set('title', __('登録内容編集'));

        $profile = $this->Profile->read(null, $id);
        $birth = $this->Profile->breakBirth($profile['Profile']['birth']);
        unset($profile['Profile']['birth']);
        $profile['Profile']['birth_year'] = $birth[0];
        $profile['Profile']['birth_month'] = $birth[1];
        $profile['Profile']['birth_day'] = $birth[2];
        $this->request->data = $profile;

        $this->set('id', $profile['Profile']['id']);

        // 社員番号セット
        $staffs = $this->User->find('all', [
            'fields' => ['id', 'staff_no'],
        ]);
        foreach($staffs as $staff) {
            $staffNo[$staff['User']['id']] = $staff['User']['staff_no'];
        }
        $this->set('staffNo', $staffNo);
        $this->Session->write('staffNo', $staffNo);
        $this->set('staffNo', $this->Session->read('staffNo'));

        // 年リストセット
        $yearList = $this->yearList();
        $this->set('yearList', $yearList);
        $this->set('yearList', $this->Session->read('yearList'));

        // 月リストセット
        $monthList = $this->monthList();
        $this->set('monthList', $monthList);
        $this->set('monthList', $this->Session->read('monthList'));

        // 日にちリストセット
        $dayList = $this->dayList();
        $this->set('dayList', $dayList);
        $this->set('dayList', $this->Session->read('dayList'));
    }

    /**
     * 編集内容確認
     */
    public function editConfirm($id = null) {
        if($id === NULL) {
            $this->redirect(BASE_URL . 'skils');
        }
        $this->set('title', __('編集内容確認'));

        // postで遷移していなければ入力画面へリダイレクト
        if(!$this->request->is('post')) {
            $this->redirect(BASE_URL . 'skils');
        }

        // バリデーションチェック
        $profile = $this->request->data['Profile'];
        $this->Profile->set($profile);
        if(!$this->Profile->validates()) {
            $this->Session->setFlash(__('入力に誤りがあります'));
            $this->Profile->validationErrors;
            $this->set('staffNo', $this->Session->read('staffNo'));
            $this->set('yearList', $this->Session->read('yearList'));
            $this->set('monthList', $this->Session->read('monthList'));
            $this->set('dayList', $this->Session->read('dayList'));
            $this->render('edit');
        } else {
            $user = $this->User->findById($this->request->data['Profile']['user_id'], ['field' => 'staff_no']);
            $this->set('userId', $user['User']['staff_no']);
            $this->set('data', $this->request->data);
            $this->render('edit_confirm');
        }
    }

    /**
     * 編集内容登録
     */
    public function editComplete($id = null) {
        if($id === NULL) {
            $this->redirect(BASE_URL . 'skils');
        }

        // postで遷移していなければ入力画面へリダイレクト
        if(!$this->request->is('post')) {
            $this->redirect(BASE_URL . 'skils');
        }

        $profile = $this->request->data['Profile'];
        $birth = $this->Profile->fairingBirth($profile['birth_year'], $profile['birth_month'], $profile['birth_day']);
        if(!$birth) {
            $this->Session->setFlash(__('入力に誤りがあります'));
            $this->Profile->validationErrors['birth_year'] = __('この項目は必須です');
            $this->Profile->validationErrors['birth_month'] = __('この項目は必須です');
            $this->Profile->validationErrors['birth_day'] = __('この項目は必須です');
            $this->set('staffNo', $this->Session->read('staffNo'));
            $this->set('yearList', $this->Session->read('yearList'));
            $this->set('monthList', $this->Session->read('monthList'));
            $this->set('dayList', $this->Session->read('dayList'));
            $this->render('edit');
        } else {
            unset($profile['birth_year']);
            unset($profile['birth_month']);
            unset($profile['birth_day']);
            $profile['birth'] = $birth;
        }

        // DBへ格納
        $this->Profile->set($profile);
        unset($this->Profile->validate['birth_year']);
        unset($this->Profile->validate['birth_month']);
        unset($this->Profile->validate['birth_day']);
        if($this->Profile->save()) {
            $this->Session->setFlash(__('プロフィールを更新しました'));
            $this->Session->delete('staffNo');
            $this->Session->delete('yearList');
            $this->Session->delete('monthList');
            $this->Session->delete('dayList');
            $this->redirect(BASE_URL . 'skils');
        } else {
            $this->Session->setFlash(__('入力に誤りがあります'));
            $this->Profile->validationErrors;
            $this->set('staffNo', $this->Session->read('staffNo'));
            $this->set('yearList', $this->Session->read('yearList'));
            $this->set('monthList', $this->Session->read('monthList'));
            $this->set('dayList', $this->Session->read('dayList'));
            $this->render('edit');
        }
    }

    /**
     * 年リスト作成
     */
    public function yearList() {
        $nowYear = Date('Y');
        for($i = 0; $i < self::YEAR_LIST; $i++) {
            $oldYear = $nowYear - $i;
            $yearList[$oldYear] = $oldYear;
        }

        return $yearList;
    }

    /**
     * 月リスト作成
     */
    public function monthList() {
        for($i = 1; $i <= self::MONTH_LIST; $i++) {
            $monthList[$i] = $i;
        }

        return $monthList;
    }

    /**
     * 日にちリスト作成
     */
    public function dayList() {
        for($i = 1; $i <= self::DAY_LIST; $i++) {
            $dayList[$i] = $i;
        }

        return $dayList;
    }

}