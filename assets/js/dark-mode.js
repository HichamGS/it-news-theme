jQuery(function($) {
    /*Click on dark mode icon. Add dark mode classes and wrappers. 
    Store user preference through sessions*/
    $('.wpnm-button').click(function() {
        //Show either moon or sun
        $('.wpnm-button').toggleClass('active');
        //If dark mode is selected
        if ($('.wpnm-button').hasClass('active')) {
            //Add dark mode class to the body
            $('body').addClass('dark-mode');
            //Save user preference to Storage
            localStorage.setItem('darkMode', true);
        } else {
            $('body').removeClass('dark-mode');
            localStorage.removeItem('darkMode');
        }
    })
    //Check Storage. Display user preference 
    if (localStorage.getItem("darkMode")) {
        $('body').addClass('dark-mode');
        $('.wpnm-button').addClass('active');
    }
})



/*
function prevNavHistory() {window.history.back();}

function setDarkTheme()
{
    body.className = "dark-mode";
    document.cookie = "theme=dark;" + getExpires() + "; path=/";
}

function setLightTheme()
{
    body.className = "light-mode";
    document.cookie = "theme=light;" + getExpires() + "; path=/";
}

function setThemeFromOS() {
    if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
        body.className = "dark-mode";
        document.cookie = "theme=autodark;" + getExpires() + "; path=/";
    } else {
        body.className = "light-mode";
        document.cookie = "theme=autolight;" + getExpires() + "; path=/";
    }

}

function autoSetTheme() {
    if (document.cookie.match(/theme=dark/i)!= null) {
        setDarkTheme();
    } else if (document.cookie.match(/theme=light/i)!=null) {
        setLightTheme();
    } else {
        setThemeFromOS();
    }
}

function getExpires()
{
    var d = new Date();
    var nbJours = 7;
    d.setTime(d.getTime() + (nbJours * 24 * 60 * 60 * 1000));
    var expires = "expires="+ d.toUTCString();

    return expires;
}

function checkTheme() {
    var route = Routing.generate('tech_it_current_user');
    var loggedRequest = new XMLHttpRequest();

    loggedRequest.onreadystatechange = function () {
        if (this.readyState == 4) {
            if (this.status === 200) {
                var user = JSON.parse(this.responseText).current_user;
                var detailsRoute = Routing.generate('tech_it_user_update_theme', {'username': user.username});

                var httpRequest = new XMLHttpRequest();
                httpRequest.onreadystatechange = function () {
                    if (httpRequest.readyState == 4) {
                        if (httpRequest.status == 200) {
                            var details = JSON.parse(this.responseText).user.user_option;
                            if (details.theme_ids[0] == 1) {
                                setDarkTheme();
                            } else {
                                setLightTheme();
                            }
                        } else {
                            autoSetTheme();
                        }
                    }
                };
                httpRequest.open('GET', detailsRoute, true);
                httpRequest.setRequestHeader("X-Requested-With", "XMLHttpRequest");
                httpRequest.withCredentials = true;
                httpRequest.send();
            } else {
                autoSetTheme();
            }
        }
    };
    loggedRequest.open('GET', route, true);
    loggedRequest.send();
}

function toggleTheme() {
    var route = Routing.generate('tech_it_current_user');
    var loggedRequest = new XMLHttpRequest();

    loggedRequest.onreadystatechange = function () {
        if (this.readyState == 4) {
            if (this.status === 200) {
                var user = JSON.parse(this.responseText).current_user;

                var csrfToken = "";
                var routeCsrf = Routing.generate('tech_it_csrf');
                var httpRequest = new XMLHttpRequest();
                httpRequest.onreadystatechange = function () {
                    if (httpRequest.readyState == 4) {
                        if (httpRequest.status == 200) {
                            var jsonResponse = httpRequest.responseText;
                            var response = JSON.parse(jsonResponse);

                            csrfToken = response.csrf;
                            var routeSession = Routing.generate('tech_it_user_update_theme', {'username': user.username});
                            var sessionRequest = new XMLHttpRequest();

                            if (document.cookie.match(/theme=dark/i)!= null) {
                                var theme = "light";
                                var datas = "theme_ids[]=2";
                            } else {
                                var theme = "dark";
                                var datas = "theme_ids[]=1";
                            }

                            sessionRequest.onreadystatechange = function () {
                                if (sessionRequest.readyState == 4) {
                                    if (sessionRequest.status == 200) {
                                        if (theme == "dark") {
                                            setDarkTheme();
                                        } else {
                                            setLightTheme();
                                        }
                                    }
                                }
                            }
                            sessionRequest.open('PUT', routeSession, true);
                            sessionRequest.setRequestHeader("X-Requested-With", "XMLHttpRequest");
                            sessionRequest.setRequestHeader("X-CSRF-Token", csrfToken);
                            sessionRequest.setRequestHeader('Content-type', 'application/x-www-form-urlencoded; charset=UTF-8');

                            sessionRequest.withCredentials = true;
                            sessionRequest.send(datas);
                        }
                    }
                };
                httpRequest.open('GET', routeCsrf, true);
                httpRequest.setRequestHeader("X-Requested-With", "XMLHttpRequest");
                httpRequest.withCredentials = true;
                httpRequest.send();
            }
            else {
                if ((document.cookie.match(/theme=dark/i)!= null) || (document.cookie.match(/theme=autodark/i)!= null)) {
                    setLightTheme();
                } else {
                    setDarkTheme();
                }
            }
        }
    };

    loggedRequest.open('GET', route, true);
    loggedRequest.send();
}

autoSetTheme();

document.addEventListener("DOMContentLoaded", function(event) {
    checkTheme();
});*/