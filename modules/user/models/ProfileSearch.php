<?php

namespace app\modules\user\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\user\models\Profile;

/**
 * ProfileSearch represents the model behind the search form of `app\modules\user\models\Profile`.
 */
class ProfileSearch extends Profile
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'department', 'posision', 'permission', 'rule'], 'integer'],
            [['emp_code', 'thai_name', 'eng_name', 'nick_name', 'birthday'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Profile::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'birthday' => $this->birthday,
            'department' => $this->department,
            'posision' => $this->posision,
            'permission' => $this->permission,
            'rule' => $this->rule,
        ]);

        $query->andFilterWhere(['like', 'emp_code', $this->emp_code])
            ->andFilterWhere(['like', 'thai_name', $this->thai_name])
            ->andFilterWhere(['like', 'eng_name', $this->eng_name])
            ->andFilterWhere(['like', 'nick_name', $this->nick_name]);

        return $dataProvider;
    }
}
