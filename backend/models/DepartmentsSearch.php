<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Departments;

/**
 * DepartmentsSearch represents the model behind the search form about `app\models\Departments`.
 */
class DepartmentsSearch extends Departments
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['department_id'], 'integer'],
            [['department_name', 'department_created_date', 'department_status', 'companies_company_id', 'branches_branch_id'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Departments::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        $query->joinWith('companiesCompany');
        $query->joinWith('branchesBranch');

        $query->andFilterWhere([
            'department_id' => $this->department_id,
             'department_created_date' => $this->department_created_date,
        ]);

        $query->andFilterWhere(['like', 'department_name', $this->department_name])
            ->andFilterWhere(['like', 'department_status', $this->department_status])
        ->andFilterWhere(['like', 'companies.company_name', $this->companies_company_id])
        ->andFilterWhere(['like', 'branches.branch_name', $this->branches_branch_id]);
        
        return $dataProvider;
    }
}
