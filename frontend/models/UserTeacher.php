<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_teacher".
 *
 * @property integer $userid
 * @property string $teacher_id
 * @property string $degree
 * @property string $title
 * @property string $telephone
 * @property string $direction
 * @property string $project
 * @property string $achievement
 * @property string $plurality
 * @property string $office
 * @property integer $status
 */
class UserTeacher extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_teacher';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userid'], 'required'],
            [['userid', 'status'], 'integer'],
            [['plurality'], 'string'],
            [['teacher_id', 'degree', 'title', 'telephone'], 'string', 'max' => 20],
            [['direction', 'project', 'achievement', 'office'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'userid' => '教师id',
            'teacher_id' => '教职工编号',
            'degree' => '学历水平',
            'title' => '职称',
            'telephone' => '办公电话',
            'direction' => '研究方向',
            'project' => '项目',
            'achievement' => '主要成果',
            'plurality' => '社会职位',
            'office' => '办公地点',
            'status' => 'Status',
        ];
    }

    /**
     * @inheritdoc
     * @return UserTeacherQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserTeacherQuery(get_called_class());
    }
}
