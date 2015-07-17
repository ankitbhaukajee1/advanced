<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%departments}}".
 *
 * @property integer $department_id
 * @property integer $companies_company_id
 * @property integer $branches_branch_id
 * @property string $department_name
 * @property string $department_created_date
 * @property string $department_status
 *
 * @property Companies $companiesCompany
 * @property Branches $branchesBranch
 */
class Departments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%departments}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['companies_company_id', 'branches_branch_id', 'department_name', 'department_status'], 'required'],
            [['companies_company_id', 'branches_branch_id'], 'integer'],
            [['department_created_date'], 'safe'],
            [['department_status'], 'string'],
            [['department_name'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'department_id' => 'Department ID',
            'companies_company_id' => 'Companies Company ID',
            'branches_branch_id' => 'Branches Branch ID',
            'department_name' => 'Department Name',
            'department_created_date' => 'Department Created Date',
            'department_status' => 'Department Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompaniesCompany()
    {
        return $this->hasOne(Companies::className(), ['company_id' => 'companies_company_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBranchesBranch()
    {
        return $this->hasOne(Branches::className(), ['branch_id' => 'branches_branch_id']);
    }
}
