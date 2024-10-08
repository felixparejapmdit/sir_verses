<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('EVM LV Management System') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="d-flex flex-wrap justify-content-center">

                        <!-- List of Import Docx -->
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                            <div class="box box-default" style="border: 2px solid #bbb; margin: 10px; border-radius: 15px;">
                                <div class="box-body text-center mt-4">
                                    <h5>
                                        <a href="{{ route('verse_search') }}" class="settings_button">
                                            <i class="fas fa-file-import fa-4x icon" aria-hidden="true"></i>
                                            <br><br>
                                            <span class="name">Import Word Docx</span>
                                            <span class="keywords" aria-hidden="true" style="display:none">Import_Docx, management</span>
                                        </a>
                                    </h5>
                                    <p class="help-block" style="display:none">Manage Church Hymns</p>
                                </div>
                            </div>
                        </div>

                        <!-- List of events -->
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                            <div class="box box-default" style="border: 2px solid #bbb; margin: 10px; border-radius: 15px;">
                                <div class="box-body text-center mt-4">
                                    <h5>
                                        <a href="{{ route('events.index') }}" class="settings_button">
                                            <i class="fas fa-calendar-alt fa-4x icon" aria-hidden="true"></i>
                                            <br><br>
                                            <span class="name">Events</span>
                                            <span class="keywords" aria-hidden="true" style="display:none">events, management</span>
                                        </a>
                                    </h5>
                                    <p class="help-block" style="display:none">Manage events</p>
                                </div>
                            </div>
                        </div>

                        <!-- List of event types -->
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                            <div class="box box-default" style="border: 2px solid #bbb; margin: 10px; border-radius: 15px;">
                                <div class="box-body text-center mt-4">
                                    <h5>
                                        <a href="{{ route('eventtypes.index') }}" class="settings_button">
                                            <i class="fas fa-list-alt fa-4x icon" aria-hidden="true"></i>
                                            <br><br>
                                            <span class="name">Event Types</span>
                                            <span class="keywords" aria-hidden="true" style="display:none">event types, management</span>
                                        </a>
                                    </h5>
                                    <p class="help-block" style="display:none">Manage event types</p>
                                </div>
                            </div>
                        </div>

                        
                        <!-- List of PV Information -->
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                            <div class="box box-default" style="border: 2px solid #bbb; margin: 10px; border-radius: 15px;">
                                <div class="box-body text-center mt-4">
                                    <h5>
                                        <a href="{{ route('pvinfo.index') }}" class="settings_button">
                                            <i class="fas fa-info-circle fa-4x icon" aria-hidden="true"></i>
                                            <br><br>
                                            <span class="name">PV Information</span>
                                            <span class="keywords" aria-hidden="true" style="display:none">PV Information, management</span>
                                        </a>
                                    </h5>
                                    <p class="help-block" style="display:none">Manage PV Information</p>
                                </div>
                            </div>
                        </div>


                        
                        <!-- List of lessons -->
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                            <div class="box box-default" style="border: 2px solid #bbb; margin: 10px; border-radius: 15px;">
                                <div class="box-body text-center mt-4">
                                    <h5>
                                        <a href="{{ route('lessons.index') }}" class="settings_button">
                                            <i class="fas fa-book-reader fa-4x icon" aria-hidden="true"></i>
                                            <br><br>
                                            <span class="name">Lessons</span>
                                            <span class="keywords" aria-hidden="true" style="display:none">lessons, management</span>
                                        </a>
                                    </h5>
                                    <p class="help-block" style="display:none">Manage lessons</p>
                                </div>
                            </div>
                        </div>

                        

                        <!-- List of translations -->
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                            <div class="box box-default" style="border: 2px solid #bbb; margin: 10px; border-radius: 15px;">
                                <div class="box-body text-center mt-4">
                                    <h5>
                                        <a href="{{ route('translations.index') }}" class="settings_button">
                                            <i class="fas fa-language fa-4x icon" aria-hidden="true"></i>
                                            <br><br>
                                            <span class="name">Translations</span>
                                            <span class="keywords" aria-hidden="true" style="display:none">translations, management</span>
                                        </a>
                                    </h5>
                                    <p class="help-block" style="display:none">Manage translations</p>
                                </div>
                            </div>
                        </div>


                        <!-- List of districts -->
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                            <div class="box box-default" style="border: 2px solid #bbb; margin: 10px; border-radius: 15px;">
                                <div class="box-body text-center mt-4">
                                    <h5>
                                        <a href="{{ route('districts.index') }}" class="settings_button">
                                            <i class="fas fa-map-marker-alt fa-4x icon" aria-hidden="true"></i>
                                            <br><br>
                                            <span class="name">Districts</span>
                                            <span class="keywords" aria-hidden="true" style="display:none">districts, management</span>
                                        </a>
                                    </h5>
                                    <p class="help-block" style="display:none">Manage districts</p>
                                </div>
                            </div>
                        </div>

                        <!-- List of locale_congregations -->
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                            <div class="box box-default" style="border: 2px solid #bbb; margin: 10px; border-radius: 15px;">
                                <div class="box-body text-center mt-4">
                                    <h5>
                                        <a href="{{ route('locale_congregations.index') }}" class="settings_button">
                                            <i class="fas fa-building fa-4x icon" aria-hidden="true"></i>
                                            <br><br>
                                            <span class="name">Locale Congregations</span>
                                            <span class="keywords" aria-hidden="true" style="display:none">locale_congregations, management</span>
                                        </a>
                                    </h5>
                                    <p class="help-block" style="display:none">Manage locale_congregations</p>
                                </div>
                            </div>
                        </div>

                        <!-- List of Permissions Categories -->
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                            <div class="box box-default" style="border: 2px solid #bbb; margin: 10px; border-radius: 15px;">
                                <div class="box-body text-center mt-4">
                                    <h5>
                                        <a href="{{ route('permission_categories.index') }}" class="settings_button">
                                            <i class="fas fa-lock fa-4x icon" aria-hidden="true"></i>
                                            <br><br>
                                            <span class="name">Permission Categories</span>
                                            <span class="keywords" aria-hidden="true" style="display:none">permissions, management</span>
                                        </a>
                                    </h5>
                                    <p class="help-block" style="display:none">Manage permissions</p>
                                </div>
                            </div>
                        </div>

                        <!-- List of Permissions -->
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                            <div class="box box-default" style="border: 2px solid #bbb; margin: 10px; border-radius: 15px;">
                                <div class="box-body text-center mt-4">
                                    <h5>
                                        <a href="{{ route('permissions.index') }}" class="settings_button">
                                            <i class="fas fa-shield-alt fa-4x icon" aria-hidden="true"></i>
                                            <br><br>
                                            <span class="name">Permissions</span>
                                            <span class="keywords" aria-hidden="true" style="display:none">permissions, management</span>
                                        </a>
                                    </h5>
                                    <p class="help-block" style="display:none">Manage permissions</p>
                                </div>
                            </div>
                        </div>

                        <!-- List of Groups -->
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                            <div class="box box-default" style="border: 2px solid #bbb; margin: 10px; border-radius: 15px;">
                                <div class="box-body text-center mt-4">
                                    <h5>
                                        <a href="{{ route('groups.index') }}" class="settings_button">
                                            <i class="fas fa-user-friends fa-4x icon" aria-hidden="true"></i>
                                            <br><br>
                                            <span class="name">Groups</span>
                                            <span class="keywords" aria-hidden="true" style="display:none">groups, management</span>
                                        </a>
                                    </h5>
                                    <p class="help-block" style="display:none">Manage groups</p>
                                </div>
                            </div>
                        </div>

                                                <!-- List of Users -->
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                            <div class="box box-default" style="border: 2px solid #bbb; margin: 10px; border-radius: 15px;">
                                <div class="box-body text-center mt-4">
                                    <h5>
                                        <a href="{{ route('users.index') }}" class="settings_button">
                                            <i class="fas fa-users fa-4x icon" aria-hidden="true"></i>
                                            <br><br>
                                            <span class="name">Users</span>
                                            <span class="keywords" aria-hidden="true" style="display:none">users, management</span>
                                        </a>
                                    </h5>
                                    <p class="help-block" style="display:none">Manage users</p>
                                </div>
                            </div>
                        </div>

                        <!-- List of Activity Logs -->
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                            <div class="box box-default" style="border: 2px solid #bbb; margin: 10px; border-radius: 15px;">
                                <div class="box-body text-center mt-4">
                                    <h5>
                                        <a href="{{ route('activity_logs.index') }}" class="settings_button">
                                            <i class="fas fa-clipboard-list fa-4x icon" aria-hidden="true"></i>
                                            <br><br>
                                            <span class="name">Activity Logs</span>
                                            <span class="keywords" aria-hidden="true" style="display:none">logs, activity, management</span>
                                        </a>
                                    </h5>
                                    <p class="help-block" style="display:none">Manage activity logs</p>
                                </div>
                            </div>
                        </div>

                        <!-- List of API Documentation -->
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                            <div class="box box-default" style="border: 2px solid #bbb; margin: 10px; border-radius: 15px;">
                                <div class="box-body text-center mt-4">
                                    <h5>
                                        <a href="{{ route('api_documentations.index') }}" class="settings_button">
                                            <i class="fas fa-book-open fa-4x icon" aria-hidden="true"></i>
                                            <br><br>
                                            <span class="name">API Documentation</span>
                                            <span class="keywords" aria-hidden="true" style="display:none">api, documentation</span>
                                        </a>
                                    </h5>
                                    <p class="help-block" style="display:none">View API documentation</p>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end flex-wrap -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<style>
    .icon {
        color: #0077B6;
        transition: color 0.3s ease;
    }
    .settings_button:hover .icon {
        color: #023E8A;
    }
    .box {
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .box:hover {
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }
</style>