 

namespace app\rbac;

use Yii;
use yii\rbac\Rule;

/**
 * Comprueba si el grupo coincide
 */
class UserGroupRule extends Rule
{
    public $name = 'userGroup';

    public function execute($user, $item, $params)
    {
        if (!Yii::$app->user->isGuest) {
            $group = Yii::$app->user->identity->group;
            if ($item->name === 'admin') {
                return $group == 1;
            } elseif ($item->name === 'author') {
                return $group == 1 || $group == 2;
            }
        }
        return false;
    }
}

$auth = Yii::$app->authManager;

$rule = new \app\rbac\UserGroupRule;
$auth->add($rule);

$author = $auth->createRole('author');
$author->ruleName = $rule->name;
$auth->add($author);
// ... agrega permisos hijos a $author ...

$admin = $auth->createRole('admin');
$admin->ruleName = $rule->name;
$auth->add($admin);
$auth->addChild($admin, $author);
// ... agrega permisos hijos a $admin ...

// asigna roles a usuarios. 1 y 2 son IDs devueltos por IdentityInterface::getId()
// usualmente implementado en tu modelo User.
$auth->assign($author, 2);
$auth->assign($admin, 1);


