<div class="documentation-page-content">
    <h1>CONTENT TYPE BUILDER COMPONENT</h1>

    <ul>
        <li><a href="" class="go-to" data-go-to="how-it-works">How it work (video)</a></li>
        <li><a href="" class="go-to" data-go-to="events">Events on backend</a></li>
        <li>
            API:
            <ul>
                <li><a href="" class="go-to" data-go-to="query-contents">Query contents</a></li>
                <li><a href="" class="go-to" data-go-to="query-single-content">Query single content</a></li>
                <li><a href="" class="go-to" data-go-to="create-content">Creating content</a></li>
                <li><a href="" class="go-to" data-go-to="updating-content">Updating content</a></li>
                <li><a href="" class="go-to" data-go-to="delete-content">Deleting content</a></li>
                <li><a href="" class="go-to" data-go-to="extending">Extending Content Model</a></li>
            </ul>
        </li>
    </ul>
    <br>
    <br>

    <h3 id="how-it-works">HOW IT WORKS:</h3>
    <div class="video-hold">
        <iframe src="https://drive.google.com/file/d/0B9dCEjZYeYd6aWhFNi0xLVBYWlE/preview" width="640" height="480"></iframe>
    </div>

    <h3 id="events">EVENTS ON BACKEND:</h3>
    <p>When dealing with backend, in every action like creating content, creating a new content type, updating, deleting etc has its
        own events triggered where you can hook in to process any other relevant data to your application. So if you have some
        work to be done before a content is created or after a content is created, events will help you.</p>
    <br>

    <table class="table">
        <tr>
            <th>EVENT:</th>
            <th>PARAMETERS PASSED:</th>
            <th>DESCRIPTION:</th>
        </tr>
        <tr>
            <td><pre>{type}.creating</pre> <i><small>(replace {type} for any content type you created. If it is blog, then it will be "blog.creating")</small></i></td>
            <td><b>Param 1</b>: Array of data of the new content to be created</td>
            <td>This event is triggered before the content is being created.</td>
        </tr>
        <tr>
            <td><pre>{type}.created</pre> <i><small>(replace {type} for any content type you created. If it is blog, then it will be "blog.creating")</small></i></td>
            <td><b>Param 1</b>: Eloquent object of the new created content.</td>
            <td>This event is triggered after the content is successfully created.</td>
        </tr>
        <tr>
            <td><pre>{type}.deleting</pre> <i><small>(replace {type} for any content type you created. If it is blog, then it will be "blog.deleting")</small></i></td>
            <td><b>Param 1</b>: Eloquent object of the content to be deleted</td>
            <td>This event is triggered before the content is being deleted.</td>
        </tr>
        <tr>
            <td><pre>{type}.deleted</pre> <i><small>(replace {type} for any content type you created. If it is blog, then it will be "blog.deleted")</small></i></td>
            <td><b>Param 1</b>: Eloquent object of the content to be deleted</td>
            <td>This event is triggered after the content is successfully deleted.</td>
        </tr>
        <tr>
            <td><pre>{type}.updating</pre> <i><small>(replace {type} for any content type you created. If it is blog, then it will be "blog.updating")</small></i></td>
            <td><b>Param 1</b>: Eloquent object of the content to be updated.<br>
                <b>Param 2</b>: Array of data for update.</td>
            <td>This event is triggered before the content is updated.</td>
        </tr>
        <tr>
            <td><pre>{type}.updated</pre> <i><small>(replace {type} for any content type you created. If it is blog, then it will be "blog.updated")</small></i></td>
            <td><b>Param 1</b>: Eloquent object of the content that has been updated.</td>
            <td>This event is triggered after the content is successfully updated.</td>
        </tr>
    </table>

    <h3>API:</h3>
    <p>The best way to query contents is to use the commands. You can use the raw Eloquent query but its
    more convenient to use the built-in commands for ease of query.</p>

    <h3 id="query-contents">Query Contents</h3>
    <p>On your controller, you can do this:</p>
    <pre><code data-language="php">
$commandDispatcher = app('Darryldecode\Backend\Base\Contracts\Bus\Dispatcher');

$result = $commandDispatcher->dispatchFromArray(
    'Darryldecode\Backend\Components\ContentBuilder\Commands\QueryContentsCommand',
    array(
        'type' => 'blog', // the content type. This can be string or int(id)
        'terms' => array(
            'Size'  => array('small'),
            'Color' => array('blue','green'),
            'Availability' => array('yes'),
        ), // the taxonomy terms
        'paginated' => true, // whether you want paginated results or not, default=true
        'perPage' => 8, // pagination per page, default=8
        'sortBy' => 'created_at',
        'sortOrder' => 'DESC',
        'status' => 'any', // status of the content. This can be (published|draft|any) default=any
        'authorId' => 1, // author of the content. Int
        'disablePermissionChecking' => true, // this is mandatory when using built-in commands so it will ignore permission checking!
        'startDate' => '2015-10-10', // query date range
        'endDate' => '2015-10-12', // query date range
        'with' => array(), // relations
        'queryHook' => function($query) {

            // add query here

            return $query;
        } // (optional) callable. This function hook is called before calling the $query->get() or $query->paginate()
    )
);

$result->isSuccessful(); // check if the command transaction was successful or not
$result->getStatusCode(); // the status code Ex 400,200,201 etc
$result->getData(); // the data or set of results
$result->getMessage(); // the message (success or error)
    </code></pre>

    <h3 id="query-single-content">Query Single Content</h3>
    <p>On your controller, you can do this:</p>
    <pre><code data-language="php">
$commandDispatcher = app('Darryldecode\Backend\Base\Contracts\Bus\Dispatcher');

// by ID
$result = $commandDispatcher->dispatchFromArray(
    'Darryldecode\Backend\Components\ContentBuilder\Commands\QueryContentCommand',
    array(
        'id' => 1,
        'with' => array(), // relations
        'disablePermissionChecking' => true // mandatory
    )
);

// by slug
$result = $commandDispatcher->dispatchFromArray(
    'Darryldecode\Backend\Components\ContentBuilder\Commands\QueryContentCommand',
    array(
        'slug' => 'some-entry-2',
        'with' => array(), // relations
        'disablePermissionChecking' => true // mandatory
    )
);

// by title match
$result = $commandDispatcher->dispatchFromArray(
    'Darryldecode\Backend\Components\ContentBuilder\Commands\QueryContentCommand',
    array(
        'title' => 'Some Title',
        'with' => array(), // relations
        'disablePermissionChecking' => true // mandatory
    )
);

$result->isSuccessful(); // check if the command transaction was successful or not
$result->getStatusCode(); // the status code Ex 400,200,201 etc
$result->getData(); // the data or set of results
$result->getMessage(); // the message (success or error)
    </code></pre>

    <h3 id="create-content">Create Content</h3>
    <pre><code data-language="php">
$commandDispatcher = app('Darryldecode\Backend\Base\Contracts\Bus\Dispatcher');

$result = $commandDispatcher->dispatchFromArray(
    'Darryldecode\Backend\Components\ContentBuilder\Commands\CreateContentCommand',
    array(
        'title' => 'Sample Content', // (required) string.
        'body' => 'some body', // (required) string.
        'slug' => 'sample-content', // (required) string.
        'authorId' => 1, // (required) int.  The author ID
        'contentTypeId' => 1, // (required) int. The content type ID
        'miscData' => 'string or array', // (optional)
        'status' => 'draft|publish', // (required)
        'metaData' => array( // This is likely the custom fields
            'form_group_name' => array(
                'field_key_1' => 'field value',
                'field_key_2' => 'field value',
                'field_key_3' => 'field value',
            )
        ), // (optional)
        'taxonomies' => array( // where key is the term ID
            1 => true,
            2 => true,
        ), // (optional)
        'disablePermissionChecking' => true, // (required) this is mandatory when using commands as API
    )
);
    </code></pre>

    <h3 id="update-content">Update Content</h3>
    <pre><code data-language="php">
// When updating, you may just provide only the fields you want to update
$commandDispatcher = app('Darryldecode\Backend\Base\Contracts\Bus\Dispatcher');

$result = $commandDispatcher->dispatchFromArray(
    'Darryldecode\Backend\Components\ContentBuilder\Commands\UpdateContentCommand',
    array(
        'id' => 1, // (required)
        'title' => 'Sample Content', // (optional) string.
        'body' => 'some body', // (optional) string.
        'slug' => 'sample-content', // (optional) string.
        'authorId' => 1, // (optional) int.  The author ID
        'contentTypeId' => 1, // (optional) int. The content type ID
        'miscData' => 'string or array', // (optional)
        'status' => 'draft|publish', // (required)
        'metaData' => array( // This is likely the custom fields
        'form_group_name' => array(
            'field_key_1' => 'field value',
            'field_key_2' => 'field value',
            'field_key_3' => 'field value',
            )
        ), // (optional)
        'taxonomies' => array( // where key is the term ID
            1 => true,
            2 => true,
        ), // (optional)
        'disablePermissionChecking' => true, // (required) this is mandatory when using commands as API
    )
);
    </code></pre>

    <h3 id="delete-content">Delete Content</h3>
    <pre><code data-language="php">
$commandDispatcher = app('Darryldecode\Backend\Base\Contracts\Bus\Dispatcher');

$result = $commandDispatcher->dispatchFromArray(
    'Darryldecode\Backend\Components\ContentBuilder\Commands\DeleteContentCommand',
    array(
        'id' => $id, // (required) int.
        'disablePermissionChecking' => true, // (required) this is mandatory when using commands as API
    )
);
    </code></pre>

    <h3 id="extending">Extending Content Model</h3>
    <p>There are cases you want to extend the Content's Model like adding new relations to it. To do that, follow steps below:</p>
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

use Darryldecode\Backend\Components\ContentBuilder\Models\Content;

// your new class, name it whatever you want and just make sure you extent the main Content Model
class ContentExtended extends Content {

    // your new added relations to the Content Model
    public function newAddedRelation() {
        return $this->belongsToMany('anything here..');
    }
}
</code></pre>
    <p>After you have created your new Content Model, make sure to update the backend config file, like so:</p>
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
    'content_model' => 'App\Backend\Extensions\ContentExtended', // <-- your new Content Model
</code></pre>
    <p><b>VOILA!</b> You have now full control of your Content's Model! When querying content, you can now add querying its relations like so,</p>
<pre><code data-language="php">
$result = $this->dispatchFromArray(
    'Darryldecode\Backend\Components\ContentBuilder\Commands\QueryContentsCommand',
    array(
        'type' => 'blog',
        'terms' => array(
        'Size'  => array('small'),
        'Color' => array('blue','green'),
        'Availability' => array('yes'),
        ),
        'paginated' => true,
        'status' => 'any',
        'disablePermissionChecking' => true,
        'with' => array('newAddedRelation') // <-- query your new relation
    )
);
</code></pre>
</div>

<div class="alert alert-warning">
    More documentation coming soon or you may help us improve the docs by making pull request here: <a target="_blank" href="https://github.com/darryldecode/laravelbackend-site">https://github.com/darryldecode/laravelbackend-site</a>
</div>