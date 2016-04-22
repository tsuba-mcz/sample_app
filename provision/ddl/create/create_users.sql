DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `staff_no` char(5) NOT NULL DEFAULT '' COMMENT '社員番号',
  `fname` varchar(24) NOT NULL DEFAULT '' COMMENT '姓',
  `lname` varchar(24) NOT NULL DEFAULT '' COMMENT '名',
  `fkana` varchar(24) NOT NULL DEFAULT '' COMMENT '姓の読み仮名',
  `lkana` varchar(24) NOT NULL DEFAULT '' COMMENT '名の読み仮名',
  `email` varchar(200) NOT NULL DEFAULT '' COMMENT 'メールアドレス',
  `password` varchar(255) NOT NULL DEFAULT '' COMMENT 'パスワード',
  `manager` tinyint(1) NOT NULL DEFAULT '0' COMMENT '管理者権限',
  `delete_flag` tinyint(1) NOT NULL DEFAULT '0' COMMENT '削除フラグ',
  `created` datetime DEFAULT NULL COMMENT '作成日時',
  `created_by` varchar(24) DEFAULT NULL COMMENT '作成者',
  `updated` datetime DEFAULT NULL COMMENT '更新日時',
  `updated_by` varchar(24) DEFAULT NULL COMMENT '更新者',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ユーザー情報';