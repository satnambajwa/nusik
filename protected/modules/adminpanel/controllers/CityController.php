<?php
class CityController extends controller
{
	public function actionCitymgt()
	{
		$dataProvider=new CActiveDataProvider('Cities');
		$model=new Cities('search');
		$model->unsetAttributes(); 
		if(isset($_GET['Cities']))
		$model->attributes=$_GET['Cities'];
		$this->render('citymgt',array('model'=>$model,'dataProvider'=>$dataProvider));
	}
	public function actionAddcity()
	{
		$country_id=$_POST['country'];
		$cityname=$_POST['cityname'];
		$model=new Cities;
		$model->country_id=$country_id;
		$model->name=$cityname;
		//CVarDumper::dump($model->attributes,10,1);die;
		 if($model->save())
		 {
		   echo "Record Added Success Fully";
		 }
	}
		public function loadModel($id)
	{
		$model=Cities::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	public function actionCityupdate($id)
	{
	//$country_id=$_POST['country'];
	//$cityname=$_POST['cityname'];
	$model=$this->loadModel($id);
		//CVarDumper::dump($model->attributes,10,1);die;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Cities']))
		{
			$model->attributes=$_POST['Cities'];
			if($model->save())
				$this->redirect(array('citymgt','id'=>$model->id));
		}
		$this->render('createcity',array(
			'model'=>$model,
		));
	}
	
	//hear search the city through the ajax.........
	public function actionLoadcountry()
	{
	$criteria = new CDbCriteria;
	$criteria->order = 'name';
	$model=Countries::model()->findAll($criteria);
		foreach($model as $m1)
		{
		echo "<option value='".$m1->id."'>".$m1->name."</option>";
		}
	}
		public function actionLoadcityname()
		{
	$criteria=new CDCriteria;
	$model=City::model()->findAll($criteria);
	foreach($model as $m1)
	{
	echo "<option value='".$m1->id."'>".$m1->name."</option>";
	}
		}
		
}