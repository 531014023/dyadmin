<?php
	namespace PHPSTORM_META {
	/** @noinspection PhpUnusedLocalVariableInspection */
	/** @noinspection PhpIllegalArrayKeyTypeInspection */
	$STATIC_METHOD_TYPES = [

		\D('') => [
			'Menu' instanceof Admin\Model\MenuModel,
			'Adv' instanceof Think\Model\AdvModel,
			'Mongo' instanceof Think\Model\MongoModel,
			'View' instanceof Think\Model\ViewModel,
			'Log' instanceof Admin\Model\LogModel,
			'Auth' instanceof Admin\Model\AuthModel,
			'Relation' instanceof Think\Model\RelationModel,
			'Config' instanceof Admin\Model\ConfigModel,
			'Base' instanceof Common\Model\BaseModel,
			'Admin' instanceof Admin\Model\AdminModel,
			'Merge' instanceof Think\Model\MergeModel,
		],
	];
}