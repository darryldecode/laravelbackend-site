<div class="documentation-page-content">
    <h1>BUILD YOUR OWN COMPONENT</h1>
    <br>
    <h4>WHAT IS A COMPONENT?</h4>
    <p>A component is a specific functionality of an application. Sometimes it has its own domain.
    Example of a component is a <b>USER COMPONENT</b>, <b>E-COMMERCE COMPONENT</b> or anything your application may need.
        In Laravel Backend, a component is used to separate domains or specific functionality for easy code maintenance
        and having clear separations of concerns.</p>
    <p>When building a custom component, it will have its own directory, and will have its own MVC.</p>
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
</div>