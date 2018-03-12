<?php

return [
	'operators' => 
	[
		'=' => Asdozzz\Essence\Operators\Equal::class,
		'!=' => Asdozzz\Essence\Operators\NotEqual::class,
		'like'        => Asdozzz\Essence\Operators\Like::class,
		'not_like'    => Asdozzz\Essence\Operators\NotLike::class,
		'>'           => Asdozzz\Essence\Operators\Greater::class,
		'>=' => Asdozzz\Essence\Operators\GreaterOrEqual::class,
		'<'           => Asdozzz\Essence\Operators\Less::class,
		'<=' => Asdozzz\Essence\Operators\LessOrEqual::class,
		'is_null'     => Asdozzz\Essence\Operators\IsNull::class,
		'is_not_null' => Asdozzz\Essence\Operators\IsNotNull::class,
		'between'     => Asdozzz\Essence\Operators\Between::class,
		'not_between' => Asdozzz\Essence\Operators\NotBetween::class,
		'in'          => Asdozzz\Essence\Operators\In::class,
		'not_in'      => Asdozzz\Essence\Operators\NotIn::class,
		
		'today'       => Asdozzz\Essence\Operators\Today::class,
		'yesterday'   => Asdozzz\Essence\Operators\Yesterday::class,
		'tomorrow'    => Asdozzz\Essence\Operators\Tomorrow::class,
	],
	'columns' => [
		'Boolean'    => Asdozzz\Essence\Columns\Boolean::class,
		'Date'       => Asdozzz\Essence\Columns\Date::class,
		'Datetime'   => Asdozzz\Essence\Columns\Datetime::class,
		'Floats'      => Asdozzz\Essence\Columns\Floats::class,
		'Integer'    => Asdozzz\Essence\Columns\Integer::class,
		'Password'   => Asdozzz\Essence\Columns\Password::class,
		'PrimaryKey' => Asdozzz\Essence\Columns\PrimaryKey::class,
		'String'     => Asdozzz\Essence\Columns\String::class,
		'Text'       => Asdozzz\Essence\Columns\Text::class,
		'Created_at' => Asdozzz\Essence\Columns\Created_at::class,
		'Updated_at' => Asdozzz\Essence\Columns\Updated_at::class,
		'Deleted_at' => Asdozzz\Essence\Columns\Deleted_at::class,
        'Autocomplete' => Asdozzz\Essence\Columns\Autocomplete::class,
        'Checkbox' => Asdozzz\Essence\Columns\Checkbox::class,
        'Colorpicker' => Asdozzz\Essence\Columns\Colorpicker::class,
        'Datetime' => Asdozzz\Essence\Columns\Datetime::class,
        'Date' => Asdozzz\Essence\Columns\Date::class,
        'Dateunix' => Asdozzz\Essence\Columns\Dateunix::class,
        'File' => Asdozzz\Essence\Columns\File::class,
        'Hidden' => Asdozzz\Essence\Columns\Hidden::class,
        'Image' => Asdozzz\Essence\Columns\Image::class,
        'Numerics' => Asdozzz\Essence\Columns\Numerics::class,
        'Multiselect' => Asdozzz\Essence\Columns\Multiselect::class,
        'Password' => Asdozzz\Essence\Columns\Password::class,
        'Phone' => Asdozzz\Essence\Columns\Phone::class,
        'Email' => Asdozzz\Essence\Columns\Email::class,
        'Radio' => Asdozzz\Essence\Columns\Radio::class,
        'Redactor' => Asdozzz\Essence\Columns\Redactor::class,
        'Select' => Asdozzz\Essence\Columns\Select::class,
        'Text' => Asdozzz\Essence\Columns\Text::class,
        'Textarea' => Asdozzz\Essence\Columns\Textarea::class,
	],
	'essences' => [
	    'Projects' => Asdozzz\Projects\Essences\Projects::class,
        'ProjectRoles' => Asdozzz\Projects\Essences\ProjectRoles::class,
        'ProjectUserRole' => Asdozzz\Projects\Essences\ProjectUserRole::class,
        'ProjectPermissions' => Asdozzz\Projects\Essences\ProjectPermissions::class,
        'ProjectRolePermission' => Asdozzz\Projects\Essences\ProjectRolePermission::class,
        'Requirements' => Asdozzz\Projects\Essences\Requirements::class,
        'Plans' => Asdozzz\Projects\Essences\Plans::class,

        'Tasks' => Asdozzz\Tasks\Essences\Tasks::class,
        'Priorities' => Asdozzz\Tasks\Essences\Priorities::class,
        'Statuses' => Asdozzz\Tasks\Essences\Statuses::class,
        'Trackers' => Asdozzz\Tasks\Essences\Trackers::class,

        'TaskRoles' => Asdozzz\Tasks\Essences\TaskRoles::class,
        'TaskUserRole' => Asdozzz\Tasks\Essences\TaskUserRole::class,
        'TaskPermission' => Asdozzz\Tasks\Essences\TaskPermission::class,
        'TaskRolePermission' => Asdozzz\Tasks\Essences\TaskRolePermission::class,
    ]
];