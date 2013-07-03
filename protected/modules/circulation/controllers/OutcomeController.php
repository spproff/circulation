<?php
class OutcomeController extends YBackController
{
    public function actionView($id)
    {
        $this->render('view', array('model' => $this->loadModel($id)));
    }

    public function actionCreate()
    {
        $model = new Outcome;

        if (isset($_POST['Outcome'])) {
            $model->attributes = $_POST['Outcome'];

            if ($model->save()) {
                Yii::app()->user->setFlash(
                    YFlashMessages::NOTICE_MESSAGE,
                    Yii::t('circulation', 'Запись добавлена!')
                );

                $this->redirect($_SERVER['HTTP_REFERER']);
            }
        }
        $this->render('create', array('model' => $model));
    }

    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);

        if (isset($_POST['Outcome'])) {
            $model->attributes = $_POST['Outcome'];

            if ($model->save()) {
                Yii::app()->user->setFlash(
                    YFlashMessages::NOTICE_MESSAGE,
                    Yii::t('circulation', 'Запись обновлена!')
                );

                if (!isset($_POST['submit-type']))
                    $this->redirect(array('update', 'id' => $model->id));
                else
                    $this->redirect(array($_POST['submit-type']));
            }
        }
        $this->render('update', array('model' => $model));
    }

    public function actionDelete($id)
    {
        if (Yii::app()->request->isPostRequest)
        {
            $this->loadModel($id)->delete();

            Yii::app()->user->setFlash(
                YFlashMessages::NOTICE_MESSAGE,
                Yii::t('circulation', 'Запись удалена!')
            );

            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
        }
        else
            throw new CHttpException(400, Yii::t('circulation', 'Неверный запрос. Пожалуйста, больше не повторяйте такие запросы'));
    }

    public function actionIndex()
    {
        $model = new Outcome('search');
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['Outcome']))
            $model->attributes = $_GET['Outcome'];
        $this->render('index', array('model' => $model));
    }

    public function loadModel($id)
    {
        $model = Outcome::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, Yii::t('circulation', 'Запрошенная страница не найдена.'));
        return $model;
    }

    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'outcome-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
