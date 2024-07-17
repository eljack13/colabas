<?php 
namespace app\rbac;

use yii\rbac\Rule;
use Yii;


/**
 * Comprueba si authorID coincide con el usuario pasado como parámetro
 */
class AuthorRule extends Rule
{
    public $name = 'isAuthor';

    /**
     * @param string|int $user el ID de usuario.
     * @param Item $item el rol o permiso asociado a la regla
     * @param array $params parámetros pasados a ManagerInterface::checkAccess().
     * @return bool un valor indicando si la regla permite al rol o permiso con el que está asociado.
     */
    public function execute($user, $item, $params)
    {
        return isset($params['post']) ? $params['post']->createdBy == $user : false;
    } 
}

    $auth = Yii::$app->authManager;

// agrega la regla
$rule = new \app\rbac\AuthorRule;
$auth->add($rule);

// agrega el permiso "updateOwnPost" y le asocia la regla.
$updateOwnPost = $auth->createPermission('updateOwnPost');
$updateOwnPost->description = 'Update own post';
$updateOwnPost->ruleName = $rule->name;
$auth->add($updateOwnPost);

// "updateOwnPost" será utilizado desde "updatePost"
$auth->addChild($updateOwnPost, $updatePost);

// permite a "author" editar sus propios posts
$auth->addChild($author, $updateOwnPost);


if (\Yii::$app->user->can('updatePost', ['post' => $post])) {
    // update post

}
?>