<?php

namespace tests\_fixtures;

use yii\test\ActiveFixture;

class TokenFixture extends ActiveFixture
{
    public $modelClass = 'bajhoe\user\models\Token';

    public $depends = [
        'tests\_fixtures\UserFixture'
    ];
}
