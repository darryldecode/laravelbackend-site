<div class="documentation-page-content">
    <h1>USER COMPONENT</h1>

    <ul>
        <li><a href="" class="go-to" data-go-to="how-it-works">How it work (video)</a></li>
        <li><a href="" class="go-to" data-go-to="events">Events on backend</a></li>
        <li>
            API:
            <ul>
                <li><a href="" class="go-to" data-go-to="query-users">Query users</a></li>
                <li><a href="" class="go-to" data-go-to="query-user">Query a user</a></li>
                <li><a href="" class="go-to" data-go-to="creating-a-user">Creating a user</a></li>
                <li><a href="" class="go-to" data-go-to="updating-a-user">Updating a user</a></li>
                <li><a href="" class="go-to" data-go-to="deleting-a-user">Deleting a user</a></li>
                <li><a href="" class="go-to" data-go-to="extending">Extending User Model</a></li>
            </ul>
        </li>
        <li><a href="" class="go-to" data-go-to="user-object">User Object Available Methods</a></li>
    </ul>

    <br>
    <br>

    <h3 id="how-it-works">HOW IT WORKS:</h3>
    <div class="video-hold">
        <iframe src="https://drive.google.com/file/d/0B9dCEjZYeYd6N1daV3hRaU1uQjA/preview" width="640" height="480"></iframe>
    </div>

    <h3 id="events">EVENTS ON BACKEND:</h3>
    <p>When dealing with backend, in every action like creating user, creating a new group etc has its
        own events triggered where you can hook in to process any other relevant data to your application. So if you have some
        work to be done before a user is created or after a user is created, events will help you.</p>
    <br>

    <table class="table">
        <tr>
            <th>EVENT:</th>
            <th>PARAMETERS PASSED:</th>
            <th>DESCRIPTION:</th>
        </tr>
        <tr>
            <td><pre>user.creating</pre></td>
            <td><b>Param 1</b>: Array of data of the user to be created</td>
            <td>This event is triggered before the user is being created.</td>
        </tr>
        <tr>
            <td><pre>user.created</pre></td>
            <td><b>Param 1</b>: Eloquent object of the user created</td>
            <td>This event is triggered after the user is successfully created.</td>
        </tr>
        <tr>
            <td><pre>user.updating</pre></td>
            <td><b>Param 1</b>: Array of data of the user to be updated</td>
            <td>This event is triggered before the user is being updated.</td>
        </tr>
        <tr>
            <td><pre>user.updated</pre></td>
            <td><b>Param 1</b>: Eloquent object of user that has been updated.</td>
            <td>This event is triggered after the user is updated.</td>
        </tr>
        <tr>
            <td><pre>user.deleting</pre></td>
            <td><b>Param 1</b>: Array of data of the user to be deleted</td>
            <td>This event is triggered before the user is deleted.</td>
        </tr>
        <tr>
            <td><pre>user.deleted</pre></td>
            <td><b>Param 1</b>: Eloquent object of the user that has been deleted</td>
            <td>This event is triggered after the user is successfully deleted.</td>
        </tr>
        <tr>
            <td><pre>group.creating</pre></td>
            <td><b>Param 1</b>: Array of group data to be created</td>
            <td>This event is triggered before a group is created.</td>
        </tr>
        <tr>
            <td><pre>group.created</pre></td>
            <td><b>Param 1</b>: Eloquent object of the group that has been created.</td>
            <td>This event is triggered after a group is successfully created.</td>
        </tr>
        <tr>
            <td><pre>group.deleting</pre></td>
            <td><b>Param 1</b>: Array of group data to be deleted</td>
            <td>This event is triggered before a group is deleted.</td>
        </tr>
        <tr>
            <td><pre>group.deleted</pre></td>
            <td><b>Param 1</b>: Eloquent object of the group that has been deleted</td>
            <td>This event is triggered after a group is successfully deleted.</td>
        </tr>
    </table>

    <h3>API:</h3>
    <p>The best way to deal user component is to use the commands. You can use the raw Eloquent query but its
        more convenient to use the built-in commands for ease of query.</p>

    <h3 id="query-users">Query Users with or without parameters</h3>
    <p>On your controller, you can do this:</p>
    <pre><code data-language="php">
$commandDispatcher = app('Darryldecode\Backend\Base\Contracts\Bus\Dispatcher');

$result = $commandDispatcher->dispatchFromArray(
    'Darryldecode\Backend\Components\User\Commands\QueryUsersCommand',
    array(
        'firstName' => '', // (optional) string
        'lastName' => '', // (optional) string
        'email' => '', // (optional) string
        'groupId' => '', // (optional) int
        'orderBy' => 'created_at', // (optional) string
        'orderSort' => 'DESC', // (optional) string. Values:(ASC|DESC) Default: DESC
        'paginated' => true, // (optional) boolean. Default: true
        'perPage' => 15, // (optional) int. Default: 15
        'with' => array('groups'), // (optional) array.
    )
);

$result->isSuccessful(); // check if the command transaction was successful or not
$result->getStatusCode(); // the status code Ex 400,200,201 etc
$result->getData(); // the data or set of results
$result->getMessage(); // the message (success or error)
    </code></pre>

    <h3 id="query-user">Display single user</h3>
    <pre><code data-language="php">
$commandDispatcher = app('Darryldecode\Backend\Base\Contracts\Bus\Dispatcher');

$result = $commandDispatcher->dispatchFromArray(
'Darryldecode\Backend\Components\User\Commands\QueryUsersCommand',
    array(
        'id' => '', // (required) int
        'with' => array('groups'), // (optional) array.
    )
);

$result->isSuccessful(); // check if the command transaction was successful or not
$result->getStatusCode(); // the status code Ex 400,200,201 etc
$result->getData(); // the data or set of results
$result->getMessage(); // the message (success or error)
    </code></pre>

    <h3 id="creating-a-user">CREATING A USER:</h3>
    <pre><code data-language="php">
$commandDispatcher = app('Darryldecode\Backend\Base\Contracts\Bus\Dispatcher');

$result = $commandDispatcher->dispatchFromArray(
    'Darryldecode\Backend\Components\User\Commands\CreateUserCommand',
    array(
        'firstName' => 'John', // (required) string.
        'lastName' => 'Doe', // (require) string.
        'email' => 'jd@mail.com', // (require) string.
        'password' => 'somerandompassword', // (require) string.
        'permissions' => array(
                'user.manage' => 1, // 1 allow, 0 inherit, -1 deny
                'user.delete' => 1,
            ), // (optional) array.
        'groups' => array(
                1 // the ID of the group you want the user to be associated with
            ), // (optional) array.
        'disablePermissionChecking' => true // (required) this is mandatory when a command is used as API
    )
);
    </code></pre>

    <h3 id="updating-a-user">UPDATING A USER:</h3>
    <pre><code data-language="php">
$commandDispatcher = app('Darryldecode\Backend\Base\Contracts\Bus\Dispatcher');

// When updating, you can provide only the fields you want to update
$result = $commandDispatcher->dispatchFromArray(
    'Darryldecode\Backend\Components\User\Commands\UpdateUserCommand',
    array(
        'firstName' => 'John', // (optional) string.
        'lastName' => 'Doe', // (optional) string.
        'email' => 'jd@mail.com', // (optional) string.
        'password' => 'somerandompassword', // (optional) string.
        'permissions' => array(
        'user.manage' => 1, // 1 allow, 0 inherit, -1 deny
        'user.delete' => 1,
        ), // (optional) array.
        'groups' => array(
        1 => true // the ID of the group you want the user to be associated with
        ), // (optional) array.
        'disablePermissionChecking' => true // (required) this is mandatory when a command is used as API
    )
);
    </code></pre>

    <h3 id="deleting-a-user">DELETING A USER:</h3>
    <pre><code data-language="php">
$commandDispatcher = app('Darryldecode\Backend\Base\Contracts\Bus\Dispatcher');

$result = $commandDispatcher->dispatchFromArray(
    'Darryldecode\Backend\Components\User\Commands\DeleteUserCommand',
    array(
        'id' => $userId,
        'disablePermissionChecking' => true // (required) this is mandatory when a command is used as API
    )
);
    </code></pre>

    <h3 id="extending">Extending User Model</h3>
    <p>There are cases you want to extend the User's Model like adding new relations to it. To do that, follow steps below:</p>
    <p><b>STEP 1.)</b></p>
    <p>Navigate to <b><i>"config/backend/backend.php"</i></b> config file. Open that file and you will see on config array that looks like this:</p>
<pre><code data-language="php">
        /*
        * built-in component models being used
        *
        * NOTE:
        *
        * The purpose of this is for extensibility, if you want to extend relationships for user/content model
        * you can change this to your own and make sure to extend this models
        */
        'user_model'    => 'Darryldecode\Backend\Components\User\Models\User',
        'content_model' => 'Darryldecode\Backend\Components\ContentBuilder\Models\Content',
    </code></pre>
    <p>You will see above we have this two currently used models, Change it to your new model and make sure to extend it, like this:</p>
<pre><code data-language="php">
namespace App\Backend\Extensions;

use Darryldecode\Backend\Components\User\Models\User;

// your new class, name it whatever you want and just make sure you extent the main User Model
class UserExtended extends User {

    // your new added relations to the User Model
    public function newAddedRelation() {
        return $this->belongsToMany('anything here..');
    }
}
</code></pre>
    <p>After you have created your new User Model, make sure to update the backend config file, like so:</p>
<pre><code data-language="php">
        /*
        * built-in component models being used
        *
        * NOTE:
        *
        * The purpose of this is for extensibility, if you want to extend relationships for user/content model
        * you can change this to your own and make sure to extend this models
        */
        'user_model'    => 'App\Backend\Extensions\UserExtended', // <-- your new User Model
        'content_model' => 'Darryldecode\Backend\Components\ContentBuilder\Models\Content',
    </code></pre>
    <p>As well as the Application's used Auth Model. Open <b><i>"config/auth.php"</i></b>:</p>
<pre><code data-language="php">
/*
|--------------------------------------------------------------------------
| Authentication Model
|--------------------------------------------------------------------------
|
| When using the "Eloquent" authentication driver, we need to know which
| Eloquent model should be used to retrieve your users. Of course, it
| is often just the "User" model but you may use whatever you like.
|
*/
'model' => 'App\Backend\Extensions\UserExtended', // <-- your new User Model
</code></pre>

    <p><b>VOILA!</b> You have now full control of your User's Model! When querying user, you can now add querying its relations like so,</p>
<pre><code data-language="php">
$commandDispatcher = app('Darryldecode\Backend\Base\Contracts\Bus\Dispatcher');

$result = $commandDispatcher->dispatchFromArray(
    'Darryldecode\Backend\Components\User\Commands\QueryUsersCommand',
    array(
        'with' => array('newAddedRelation'), // <-- include your new relation
    )
);
</code></pre>


    <h3 id="user-object">User Object Available Methods</h3>
    <p>There are different ways to get user object:</p>
    <p>First, using the typical Laravel Version of getting the current logged in user:</p>
<pre><code data-language="php">
$User = \Auth::user();
</code></pre>
    <p>Second, is in your controller that extends the <i><b>\Darryldecode\Backend\Base\Controllers\BaseController</b></i>,
    you can access the parent user property which contains the current logged in user or false if not logged in.</p>
<pre><code data-language="php">
// inside your controller method that extends \Darryldecode\Backend\Base\Controllers\BaseController
$User = $this->user; // returns false if not logged in
</code></pre>
    <p>Third, is just by querying a user:</p>
<pre><code data-language="php">
$commandDispatcher = app('Darryldecode\Backend\Base\Contracts\Bus\Dispatcher');

$result = $commandDispatcher->dispatchFromArray(
    'Darryldecode\Backend\Components\User\Commands\QueryUsersCommand',
    array(
        'id' => '', // (required) int
        'with' => array('groups'), // (optional) array.
    )
);

$UserObject = $result->getData();
</code></pre>

    <h5>Check if User belongs to a specific group:</h5>
<pre><code data-language="php">
$group = 1; // using group ID
$group = 'members'; // or using group name
$group = $GroupObject; // or the group object

$UserObject->inGroup($group); // returns true or false
</code></pre>

    <h5>Check if User has the given permission:</h5>
<pre><code data-language="php">
// check if user has this permission
$permission = 'blog.create';

$UserObject->hasPermission($permission); // returns true or false

// or a set of any of this permissions
$permissions = array('blog.create','blog.delete');

$UserObject->hasAnyPermission($permissions); // returns true or false
</code></pre>

    <h5>Check if User is a superuser:</h5>
<pre><code data-language="php">
$UserObject->isSuperUser(); // returns true or false
</code></pre>

    <h5>Get User's combined permissions. This will include permission acquired from its group and its specific given permissions:</h5>
<pre><code data-language="php">
$UserObject->getCombinedPermissions(); // returns array of permissions
</code></pre>
</div>

<div class="alert alert-warning">
    More documentation coming soon or you may help us improve the docs by making pull request here: <a target="_blank" href="https://github.com/darryldecode/laravelbackend-site">https://github.com/darryldecode/laravelbackend-site</a>
</div>