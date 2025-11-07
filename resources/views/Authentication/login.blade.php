<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('authentication/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/common/css/toaster.css') }}">
</head>
<body class="bg-gradient-to-br from-slate-950 via-slate-900 to-slate-950 min-h-screen">
    <div class="flex flex-col min-h-screen justify-center items-center px-4 py-8">
        <div class="max-w-md w-full">
            <!-- Logo Section -->
            <div class="text-center mb-8 fade-in">
                <div class="inline-block text-white text-4xl font-bold ">
                    <img src="/assets/logo.png" alt="" class="w-40">
                </div>
                <!-- <p class="text-slate-400 text-sm">Your Gateway to Open Mic Performances</p> -->
            </div>
            
        
            
            <!-- Registration Form (Hidden Initially) -->
            <div id="loginForm" class=" fade-in">
                <div class="glass-effect rounded-3xl shadow-2xl p-8 md:p-10">
                   
                    <div class="text-center mb-8">
                        <!-- <div id="roleIcon" class="text-6xl mb-3">🎤</div> -->
                        <h2 class="text-3xl font-bold mb-2 text-white" id="formTitle">Login</h2>
                        <p class="text-slate-400 text-sm">Login to get started</p>
                    </div>
                    
                    <form class="space-y-4">
                        <input type="hidden" id="userRole" name="role" value="">
                        
                        <div>
                            <label class="block text-sm font-medium text-slate-300 mb-2">Username/Email</label>
                            <input class="input-field w-full px-4 py-3 border-2 border-slate-700 rounded-xl focus:border-slate-500 focus:outline-none transition-all text-white placeholder-slate-500" 
                                   id="username" name="username" type="text" placeholder="Choose a username" required>
                        </div>
                        
                        
                        <div>
                            <label class="block text-sm font-medium text-slate-300 mb-2">Password</label>
                            <input class="input-field w-full px-4 py-3 border-2 border-slate-700 rounded-xl focus:border-slate-500 focus:outline-none transition-all text-white placeholder-slate-500" 
                                   id="password" name="password" type="password" placeholder="Create a password" required>
                        </div>
                        
                        <button type="submit" id="login" class="btn-primary w-full rounded-xl py-3.5 text-white font-semibold text-lg mt-6 shadow-lg">
                            Login
                        </button>
                        
                        <div class="text-center mt-6">
                            <p class="text-sm text-slate-400">
                                Don't have an account? 
                                <a href="{{ route('register') }}" class="text-slate-400 font-semibold hover:text-slate-300 transition-colors">Sign Up</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<script>
    const URL = "{{ env('API_ROUTE_URL') }}";
    $(document).ready(function() {
        $('#login').click(function(e) {
            e.preventDefault();
            $.ajax({
                url: URL + '/auth/login',
                type: 'POST',
                data: {
                    username: $('#username').val(),
                    password: $('#password').val()
                },
                success: function(response) {
                    
                    if (response.success) {
                        localStorage.removeItem('auth_token');
                        localStorage.setItem('auth_token', response.data.token);
                        window.location.href = '{{ route('home') }}';
                    } else {
                        customToast(response.message, 'error');
                    }
                },
                error: function(response) {
                    customToast(response.message, 'error');
                }
            });
            
        });



        function checkTokenValid(){
            if(localStorage.getItem('auth_token')){
                window.location.href = '/home';
            }
        }
        checkTokenValid();
    });


    // Modern Toast Notification Function
    function customToast(message, type = 'success') {
        $('.custom-toast').addClass('toast-exit');
        setTimeout(() => $('.custom-toast').remove(), 2000);
        
        const config = {
            success: {
                icon: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" /></svg>',
                title: 'Success'
            },
            error: {
                icon: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z" clip-rule="evenodd" /></svg>',
                title: 'Error'
            },
            info: {
                icon: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 01.67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 11-.671-1.34l.041-.022zM12 9a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" /></svg>',
                title: 'Info'
            },
            warning: {
                icon: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path fill-rule="evenodd" d="M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.4 3.003zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" /></svg>',
                title: 'Warning'
            }
        };
        
        const current = config[type] || config.info;
        
        const toast = $(`
            <div class="custom-toast toast-${type}">
                <div class="toast-glow"></div>
                <div class="toast-content">
                    <div class="toast-icon-wrapper">
                        <div class="toast-icon">${current.icon}</div>
                        <div class="toast-icon-pulse"></div>
                    </div>
                    <div class="toast-text">
                        <div class="toast-title">${current.title}</div>
                        <div class="toast-message">${message}</div>
                    </div>
                    <button class="toast-close">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M6.225 4.811a1 1 0 00-1.414 1.414L10.586 12 4.81 17.775a1 1 0 101.414 1.414L12 13.414l5.775 5.775a1 1 0 001.414-1.414L13.414 12l5.775-5.775a1 1 0 00-1.414-1.414L12 10.586 6.225 4.81z"/></svg>
                    </button>
                </div>
                <div class="toast-progress"></div>
            </div>
        `);
        
        toast.find('.toast-close').on('click', function() {
            toast.addClass('toast-exit');
            setTimeout(() => toast.remove(), 300);
        });
        
        $('body').append(toast);
        
        setTimeout(() => {
            if (toast.is(':visible')) {
                toast.addClass('toast-exit');
                setTimeout(() => toast.remove(), 300);
            }
        }, 4000);
    }
        
</script>


</body>
</html>