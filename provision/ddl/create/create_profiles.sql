DROP TABLE IF EXISTS `profiles`;
CREATE TABLE IF NOT EXISTS `profiles` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL DEFAULT '0',
  `profile_name` varchar(24) NOT NULL DEFAULT '' COMMENT '名前',
  `initial` char(3) NOT NULL DEFAULT '' COMMENT 'イニシャル',
  `phonetic` varchar(24) NOT NULL DEFAULT '' COMMENT 'フリガナ',
  `gender` tinyint(1) NOT NULL DEFAULT '0' COMMENT '性別（0：男性/1：女性）',
  `birth` date NOT NULL DEFAULT '9999-12-31' COMMENT '生年月日',
  `simple_address` varchar(17) NOT NULL DEFAULT '' COMMENT '簡易住所',
  `detail_address` varchar(62) NOT NULL DEFAULT '' COMMENT '詳細住所',
  `near_station` varchar(17) NOT NULL DEFAULT '' COMMENT '最寄駅',
  `school` varchar(17) NOT NULL DEFAULT '' COMMENT '出身校',
  `faculty` varchar(17) DEFAULT NULL COMMENT '学部',
  `department` varchar(17) DEFAULT NULL COMMENT '学科',
  `graduation_year` varchar(17) NOT NULL DEFAULT '' COMMENT '卒業年',
  `license` text COMMENT '取得資格',
  `created` datetime DEFAULT NULL COMMENT '作成日時',
  `created_by` varchar(24) DEFAULT NULL COMMENT '作成者',
  `updated` datetime DEFAULT NULL COMMENT '更新日時',
  `updated_by` varchar(24) DEFAULT NULL COMMENT '更新者',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='社員情報';