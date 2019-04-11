    <div class="sidebar" data-color="purple">
    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="{{ url('/') }}" class="simple-text">
                    Engine Manage
                </a>
            </div>

            <ul class="nav">
                <li {{ TemplateHelper::checkMenuSelected('/') }}>
                    <a href="{{ url('/') }}">
                        <i class="pe-7s-graph"></i>
                        <p>Home</p>
                    </a>
                </li>
                <li {{ TemplateHelper::checkMenuSelected('users') }}>
                    <a href="{{ url('/users') }}">
                        <i class="pe-7s-user"></i>
                        <p>User</p>
                    </a>
                </li>
                <li {{ TemplateHelper::checkMenuSelected('rooms') }}>
                    <a href="{{ url('/rooms') }}">     
                        <i class="pe-7s-culture"></i>
                        <p>Room </p>
                    </a>
                </li>
                <li {{ TemplateHelper::checkMenuSelected('computers') }}>
                    <a href="{{ url('/computers') }}">
                        <i class="pe-7s-display1"></i>
                        <p>Computer </p>
                    </a>
                </li>
                <li {{ TemplateHelper::checkMenuSelected('devices') }}>
                    <a href="{{ url('/devices') }}">
                        <i class="pe-7s-note2"></i>
                        <p>Device </p>
                    </a>
                </li>
                <li {{ TemplateHelper::checkMenuSelected('tags') }}>
                    <a href="{{ url('/tags') }}">
                        <i class="pe-7s-ticket"></i>
                        <p>Tag </p>
                    </a>
                </li>
                <li {{ TemplateHelper::checkMenuSelected('typedevices') }}>
                    <a href="{{ url('typedevices') }}">
                        <i class="pe-7s-note2"></i>
                        <p>Type Devices </p>
                    </a>
                </li>
                <li>
                    <a href="{{ url('tasks') }}">
                        <i class="pe-7s-note2"></i>
                        <p>Task</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>