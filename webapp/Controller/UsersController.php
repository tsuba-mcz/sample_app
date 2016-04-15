<?php

class UsersController extends AppController
{
    public $uses = ['User'];
    public $helpers = ['Session'];
    public $components = ['Session'];

    // public function beforeFilter() {
    //     parent::beforeFilter();
    //     $this->Auth->allow('add');
    // }

    /**
     * ユーザー一覧表示
     */
    public function index() {
        $users = $this->User->find('all', [
            'conditions' => ['delete_flag' => '0'],
            'fields' => [
                'id',
                'staff_no',
                'fname',
                'lname',
                'fkana',
                'lkana',
                'email',
                'manager',
            ],
        ]);
        $loginUser = $this->Auth->user();
        $this->set('title', __('ユーザー一覧'));
        $this->set('users', $users);
        $this->set('auth', $loginUser);
    }

    /**
     * ユーザー登録
     */
    public function add() {
        $this->set('title', __('ユーザー追加'));
        if(!$this->request->is('post')) {
            return;
        }

        $user = $this->request->data['User'];
        $this->User->set($user);
        if($this->User->save()) {
            $this->Session->setFlash(__('ユーザーを追加しました。'));
            $this->redirect(BASE_URL . 'users');
        } else {
            $this->Session->setFlash(__('入力に誤りがあります'));
            $this->User->varidationErrors;
        }
    }

    /**
     * ユーザー編集
     */
    public function edit($id = null) {
        if($id === NULL) {
            $this->redirect(BASE_URL . 'users');
        }

        $this->User->id = $id;
        if($this->request->is('post')) {
            unset($this->User->validate['password']);
            unset($this->User->validate['password_confirm']);
            if($this->User->save($this->request->data['User'])) {
                $this->Session->setFlash(__('ユーザー情報を更新しました'));
                $this->redirect(BASE_URL . 'users');
            } else {
                $this->Session->setFlash(__('入力に誤りがあります'));
                $this->User->varidationErrors;
            }
        } else {
            $this->request->data = $this->User->read(null, $id);
        }

        $this->set('title', __('ユーザー編集'));
    }

    /**
     * ユーザー削除
     */
    public function delete($id = null) {
        if($id === NULL) {
            $this->redirect(BASE_URL . 'users');
        }

        $this->User->id = $id;
        unset($this->User->validate);
        $this->request->data = [
            'id' => $id,
            'delete_flag' => '1',
        ];
        if($this->User->save($this->request->data)) {
            $this->Session->setFlash(__('ユーザーを削除しました'));
            $this->redirect(BASE_URL . 'users');
        } else {
            $this->Session->setFlash(__('ユーザーを削除できませんでした'));
            $this->redirect(BASE_URL . 'users');
        }
    }

    /**
     * ログイン処理
     */
    public function login() {
        if(! is_null($this->Auth->user())) {
            $this->redirect(BASE_URL . 'users');
            exit;
        }
        if($this->request->is('post')) {
            if($this->Auth->login()) {
                $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Session->setFlash(__('ログインに失敗しました'));
            }
        }
    }

    /**
     * ログアウト処理
     */
    public function logout() {
        if(is_null($this->Auth->user())) {
            $this->redirect(BASE_URL . 'users/login');
        }
        $this->Session->setFlash(__('ログアウトしました'));
        $this->redirect($this->Auth->logout());
    }

}