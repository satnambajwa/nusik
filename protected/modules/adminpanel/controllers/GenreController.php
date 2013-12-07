<?php
class GenreController extends Controller
{
	public function actionGenremgt()
	{
	$model=new Genres;
	$this->render('genremgt',array('model'=>$model));
	}
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('genre'));
	}
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ArtistTrack']))
		{
			$model->attributes=$_POST['ArtistTrack'];
			if($model->save())
				$this->redirect(array('trackmgt','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
	
	public function actionTrackmgt()
	{
		$model=new ArtistTrack('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ArtistTrack']))
			$model->attributes=$_GET['ArtistTrack'];

		$this->render('trackmgt',array(
			'model'=>$model,
		));
	}
	public function loadModel($id)
	{
		$model=ArtistTrack::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	public function actionDeleteartisthastrack($id)
	{
		$this->dhasloadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('genre/artisthas'));
	}
		public function dhasloadModel($id)
	{
		$model=ArtistTrackHasComments::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
		public function actionArtisthas()
	{
		$model=new ArtistTrackHasComments('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ArtistTrackHasComments']))
			$model->attributes=$_GET['ArtistTrackHasComments'];

		$this->render('artisthas',array(
			'model'=>$model,
		));
	}
	
}
?>