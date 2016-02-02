<?php


namespace app\models;


class Reportes
{

    public static function translations()
    {

        $lang = [
            'downloadJPEG' => 'Descargar JPG',
            'downloadPNG' => null,//'Descargar en PNG',
            'downloadPDF' => 'Descargar PDF',
            'downloadSVG' => null,//'Descargar en SVG',
            'downloadCSV' => null,//'Descargar CSV',
            'downloadXLS' => 'Descargar XLS',
            'printChart' => 'Imprimir',
        ];
        return $lang;

    }


    public static function crearArrayMetas($tipo_proyecto)
    {

        for ($i = 2015; $i <= 2020; $i++) {
            $resultado[] = self::consultarCoberturaAno($tipo_proyecto, $i);
        }

        return $resultado;

    }

    private static function consultarCoberturaAno($tipo_proyecto, $ano)
    {

        $subQuery = (new \yii\db\Query())
            ->from('faer')
            ->where(['categoria' => $tipo_proyecto])
            ->andWhere(['EXTRACT(YEAR FROM fecha_aprobacion)' => $ano]);

        $rows = (new \yii\db\Query())
            ->select(['SUM(usuarios_nuevos)'])
            ->from('detalle_proyecto')
            ->innerJoin(['u' => $subQuery], 'u.numero = detalle_proyecto.numero')
            ->all();

        return intval($rows[0]['sum']);

    }


    public static function consultarMetas($tipo_proyecto)
    {

        $resultado = [];

        for ($y = 2015; $y <= 2020; $y++) {
            $resultado[] = MetasCobertura::findOne(['categoria' => $tipo_proyecto, 'ano' => $y])->cobertura;
        }

        return $resultado;

    }


    public static function crearArrayDatosBeneficiarios($parametros)
    {

        $subQuery = (new \yii\db\Query())
            ->from('faer')
            ->where(['EXTRACT(YEAR FROM fecha_aprobacion)' => $parametros['ano']]);

        if(!empty($parametros['categoria'])){
            $subQuery->andWhere(['categoria'=>$parametros['categoria']]);
        }

        if(!empty($parametros['subcategoria'])){
            $subQuery->andWhere(['subcategoria'=>$parametros['subcategoria']]);
        }

        if(!empty($parametros['convocatoria'])){
            $subQuery->andWhere(['convocatoria'=>$parametros['convocatoria']]);
        }

        $rows = (new \yii\db\Query())
            ->select(['id_departamento', 'SUM(usuarios_nuevos)'])
            ->from('detalle_proyecto')
            ->innerJoin(['u' => $subQuery], 'u.numero = detalle_proyecto.numero')
            ->groupBy(["detalle_proyecto.id_departamento"])
            ->all();

        $resultado = [];

        foreach ($rows as $row) {
            $temp = [];
            $temp['name'] = Divipola::findOne(['id_dpto' => $row['id_departamento']])->dpto;
            $temp['y'] = intval($row['sum']);
            array_push($resultado, $temp);
        }

        if (count($rows) == 0) {
            $temp = [];
            $temp['name'] = "No se encontraron resultados";
            $temp['y'] = 1;
            array_push($resultado, $temp);
        }


        return $resultado;

    }


    public static function crearArrayDatosFondos($parametros)
    {

        $subQuery = (new \yii\db\Query())
            ->from('faer')
            ->where(['EXTRACT(YEAR FROM fecha_aprobacion)' => $parametros['ano']]);

        if(!empty($parametros['categoria'])){
            $subQuery->andWhere(['categoria'=>$parametros['categoria']]);
        }

        if(!empty($parametros['subcategoria'])){
            $subQuery->andWhere(['subcategoria'=>$parametros['subcategoria']]);
        }

        if(!empty($parametros['convocatoria'])){
            $subQuery->andWhere(['convocatoria'=>$parametros['convocatoria']]);
        }

        $rows = (new \yii\db\Query())
            ->select(['id_departamento', 'SUM(total)'])
            ->from('detalle_proyecto')
            ->innerJoin(['u' => $subQuery], 'u.numero = detalle_proyecto.numero')
            ->groupBy(["detalle_proyecto.id_departamento"])
            ->all();

        $resultado = [];

        foreach ($rows as $row) {
            $temp = [];
            $temp['name'] = Divipola::findOne(['id_dpto' => $row['id_departamento']])->dpto;
            $temp['y'] = doubleval($row['sum']);
            array_push($resultado, $temp);
        }

        if (count($rows) == 0) {
            $temp = [];
            $temp['name'] = "No se encontraron resultados";
            $temp['y'] = 1;
            array_push($resultado, $temp);
        }

        return $resultado;

    }


}