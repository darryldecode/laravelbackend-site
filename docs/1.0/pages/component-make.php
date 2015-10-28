<div class="documentation-page-content">
    <h1>BUILD YOUR OWN COMPONENT</h1>

    <ul>
        <li><a href="" class="go-to" data-go-to="what-is-a-component">What is a component?</a></li>
        <li>
            Component Files And Structure
            <ul>
                <li><a href="" class="go-to" data-go-to="the-component-file">The Component File</a></li>
                <li><a href="" class="go-to" data-go-to="the-component-routes-file">The Component's Routes File</a></li>
            </ul>
        </li>
    </ul>

    <br>
    <h4 id="what-is-a-component">WHAT IS A COMPONENT?</h4>
    <p>A component is a specific functionality of an application. Sometimes it has its own domain.
    Example of a component is a <b>USER COMPONENT</b>, <b>E-COMMERCE COMPONENT</b> or anything your application may need.
        In Laravel Backend, a component is used to separate domains or specific functionality for easy code maintenance
        and having clear separations of concerns.</p>
    <p>When building a custom component, it will have its own directory, and will have its own MVVM|MVC.</p>
    <br>
    <h4>So let's begin building our first custom component:</h4>
    <ul>

        <li>
            <p>1.) First thing to do is using our CLI tool: <pre>php artisan backend:component-create</pre></p>
            <p>After that command, it will ask you three question that look like this:</p>
            <img src="../../resources/images/component1.png">
            <ul>
                <li><b>COMPONENT NAME:</b> The name of your custom component.</li>
                <li><b>COMPONENT DESCRIPTION:</b> The description of your custom component.</li>
                <li><b>COMPONENT ICON:</b> The icon of your custom component which will be visible on navigation. Only Font Awesome Icons are available.</li>
            </ul>
        </li>

        <li>
            <p>2.) After you have completed above instructions, if you are logged in as <i>superuser</i>, you will have now a new navigation entry on
            your backend which will look like this:</p>
            <img src="../../resources/images/component2.png">
        </li>

        <li>
            <p>2.) On your <pre>app/Backend/Components</pre> You will also see the folder and files of your new custom component.</p>
            <img src="../../resources/images/component3.png"><br><br>
            <p>You will notice the folder <b>app/Backend/Components/Ecommerce</b>. That is our new custom component. You will see this
            component has its own <b>routes</b> file and its own MVC Architecture. What is interesting here is we have a file also which is
            named <b>Component.php</b>. That is the core file of your component which contains the information and other relevant data
            of your custom component.</p>
        </li>
    </ul>

    <h3>The COMPONENT FILES AND STRUCTURE</h3>
    <h4 id="the-component-file">The Component File (Component.php)</h4>
    <p>This file is the main foundation of a component. It contains several methods that represents the component.<br>
        Let's take a look first the first method on this Component Class:</p>

    <p>1st: <i><b>getComponentInfo()</b></i></p>
<pre><code data-language="php">
/**
* returns the component info
*
* @return array
*/
public function getComponentInfo()
{
    return array(
        'name' => 'Artists Manager Component',
        'description' => 'A component to manage artists',
    );
}
</code></pre>
    <p>As you can see, this method returns an array containing the Component Information.</p>

    <p>2nd: <i><b>getAvailablePermissions()</b></i></p>
<pre><code data-language="php">
/**
* returns the available permissions of the component
*
* @return array
*/
public function getAvailablePermissions()
{

    // below are sample permissions, you can change them to fit your needs

    $availablePermissions = array(

        array(
            'title' => 'Manage Artists Manager\'s Component',
            'description' => 'Enable\'s the user to manage Artists Manager.',
            'permission' => 'ArtistsManager.manage',
        ),

        array(
            'title' => 'Delete Artists Manager\'s Component entry',
            'description' => 'Enable\'s the user to delete Artists Manager data.',
            'permission' => 'ArtistsManager.delete',
        ),

    );

    return $availablePermissions;
}
    </code></pre>
    <p>This method returns all the available permissions that the component provides. You can define permissions here to fit your
    components functionality and access control. The permissions defined here will be visible when managing user permissions on admin dashboard.</p>

    <p>3rd: <i><b>getNavigation()</b></i></p>
<pre><code data-language="php">
/**
* the component navigation
*
* @return ComponentNavigationCollection
*/
public function getNavigation()
{
    // the new navigation for this component
    $myComponentNavigation = new ComponentNavigation(
        'Artists Manager', // the component navigation title
        'fa fa-paint-brush', // the component icon (font awesome icons)
        url(config('backend.backend.base_url').'/artists-manager') // the component url
    );

    // the required permission to access this component
    // if the user has no permission defined here, this navigation item will not be visible
    $myComponentNavigation->setRequiredPermissions([
        'ArtistsManager.manage'
    ]);

    // if you want to add sub menus
    $myComponentNavigation->addSubMenu(
        new ComponentNavigation(
            'Artists Manager Sub Menu', // the component navigation title
            'fa fa-paint-brush', // the component icon (font awesome icons)
            url(config('backend.backend.base_url').'/artists-manager/another-url')
        );
    );

    // push the component's nav to the nav collections
    $navCollection = new ComponentNavigationCollection();
    $navCollection->push($myComponentNavigation);

    return $navCollection;
}
</code></pre>
    <p>This method is where you define your navigation that will be added on admin dashboard navigation. This should<br>
    return an instance of ComponentNavigationCollection (as you can see).</p>

    <p>4th: <i><b>getViewsPath()</b></i></p>
<pre><code data-language="php">
/**
* returns the views path
*
* @return array
*/
public function getViewsPath()
{
    return array(
        'dir' => __DIR__.'/Views',
        'namespace' => 'ArtistsManager', // the namespace of your component view ( ex. view('ArtistsManager::index') )
    );
}
</code></pre>
    <p>Nonetheless, you will never have to modify this, unless you know what you are doing.</p>

    <p>5th: <i><b>getRoutesControl()</b></i></p>
<pre><code data-language="php">
/**
* returns the views path
*
* @return array
*/
public function getViewsPath()
{
    return array(
        'dir' => __DIR__.'/Views',
        'namespace' => 'ArtistsManager', // the namespace of your component view ( ex. view('ArtistsManager::index') )
    );
}
</code></pre>
<p>Nonetheless, you will never have to modify this, unless you know what you are doing.</p>

    <p>6th: <i><b>getHeaderScripts()</b></i></p>
<pre><code data-language="php">
/**
* you can add scripts or css links here on header
*
* @return array
*/
public function getHeaderScripts()
{
    /*
    NOTE:

    css and js are important keys to identify whether a link is a javascript or css
    notice that forward slash in the beginning is present. Don't miss that!

    example:

    array(
        'css' => array(
            '/my-component/css/component-style.css',
            '/my-component/css/component-style2.css',
        ),
        'js' => array(
            '/my-component/js/component-js.js',
            '/my-component/js/component-js.js',
        )
    );

    */

    return array();
}
</code></pre>
    <p>This method is where you add your scripts and stylesheets for this component (on the header). This will be relative to public path.</p>

    <p>7th: <i><b>getFooterScripts()</b></i></p>
<pre><code data-language="php">
/**
* you can add scripts or css links here on footer
*
* @return array
*/
public function getFooterScripts()
{
    /*
    NOTE:

    css and js are important keys to identify whether a link is a javascript or css
    notice that forward slash in the beginning is present. Don't miss that!

    example:

    array(
        'js' => array(
            '/my-component/js/component-js.js',
            '/my-component/js/component-js.js',
        )
    );

    */

    return array(
        'js' => array(
            '/backend/components/artists-manager/index.js',
        )
    );
}
</code></pre>
    <p>This method is where you add your scripts and stylesheets for this component (on the footer). This will be relative to public path.</p>

    <h4 id="the-component-routes-file">The Component's Route File (routes.php)</h4>
    <p>This file contains all the routes for your component.<br>
        This file will look like below:</p>
<pre><code data-language="php">
Route::get('/artists-manager', array(
    'before' => array(),
    'as' => 'ArtistsManager',
    'uses' => 'ArtistsManagerController@index'
));
</code></pre>
    <p>All the routes here will be relative to backend base route.</p>
</div>