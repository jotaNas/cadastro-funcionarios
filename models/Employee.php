<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "employee".
 *
 * @property int $id
 * @property string $nome
 * @property string $cpf
 * @property string $logradouro
 * @property string $cep
 * @property string $cidade
 * @property string $estado
 * @property int $numero
 * @property string|null $complemento
 * @property int|null $cargo_id
 *
 * @property Role $cargo
 */
class Employee extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employee';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'cpf', 'logradouro', 'cep', 'cidade', 'estado', 'numero'], 'required'],
            [['numero', 'cargo_id'], 'integer'],
            [['nome', 'logradouro', 'cidade', 'complemento'], 'string', 'max' => 255],
            [['cpf'], 'string', 'max' => 11],
            [['cep'], 'string', 'max' => 8],
            [['estado'], 'string', 'max' => 2],
            [['cargo_id'], 'exist', 'skipOnError' => true, 'targetClass' => Role::class, 'targetAttribute' => ['cargo_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'cpf' => 'Cpf',
            'logradouro' => 'Logradouro',
            'cep' => 'Cep',
            'cidade' => 'Cidade',
            'estado' => 'Estado',
            'numero' => 'Numero',
            'complemento' => 'Complemento',
            'cargo_id' => 'Cargo ID',
        ];
    }

    /**
     * Gets query for [[Cargo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCargo()
    {
        return $this->hasOne(Role::class, ['id' => 'cargo_id']);
    }
}
