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
            </ul>
        </li>
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
$result = $this->dispatchFromArray(
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
$result = $this->dispatchFromArray(
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
$result = $this->dispatchFromArray(
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
                1 => true // the ID of the group you want the user to be associated with
            ), // (optional) array.
        'disablePermissionChecking' => true // (required) this is mandatory when a command is used as API
    )
);
    </code></pre>

    <h3 id="updating-a-user">UPDATING A USER:</h3>
    <pre><code data-language="php">
// When updating, you can provide only the fields you want to update
$result = $this->dispatchFromArray(
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
$result = $this->dispatchFromArray(
    'Darryldecode\Backend\Components\User\Commands\DeleteUserCommand',
    array(
        'id' => $userId,
        'disablePermissionChecking' => true // (required) this is mandatory when a command is used as API
    )
);
    </code></pre>
</div>