<?php

/* @var $this \yii\web\View */
/* @var $content string */

//use Yii;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;
use \yii\widgets\ActiveForm;



AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head()?>
    <script src="/web/js/jquery-3.2.1.min.js"></script>


    <script src='/web/js/nb.js'></script>
    <script>
        var $s = nbInit({});

        function updateData(model,id,key,value){
            $.getJSON("<?= Url::to('table/update') ?>",{model: model, id: id, key: key, value: value}, function(data){
            });
        }

        function readModelData(model){
            $.getJSON("<?= Url::to('table/data') ?>",{model: model}, function(data){
                $s.dataHead = [data[0]];
                var ediItem, ediKey, ediCell;
                data[1].forEach(function(item){
                    for (var key in item){
                        item[key] = {
                            ondblclick: function(){
                                //function ediFunc(){
                                if ($s.ediInput){
                                    ediItem[ediKey] = $s.ediInput;
                                    ediCell.innerHTML = $s.ediInput;
                                    updateData(model, ediCell.parentElement.children[0].innerText, ediKey, ediItem[ediKey]);
                                    ediCell = null;
                                    ediItem = null;
                                    ediKey  = null;
                                }
                                else {
                                    var text = this.innerHTML;
                                    this.innerHTML = "<input id='ediInput'/>";
                                    $s.ediInput    = text;
                                    ediItem = this.parentElement.nbData;
                                    ediCell = this;
                                    var i = 0;
                                    for (var key in ediItem){
                                        if (this.parentElement.children[i] == this){
                                            ediKey = key;
                                            break;
                                        }
                                        i++;
                                    }
                                }
                                //}
                            },
                            innerText: item[key]
                        };
                    }
                    item.__editColumn = {onclick: function(){
                        if (confirm("Are you sure to delete?")){
                            var id = this.parentElement.children[0].innerText;
                            alert(id);
                            $.getJSON("<?= Url::to('table/delete') ?>",{model: model, id: id}, function(data){
                                readModelData(model);
                            });
                        }
                    },
                        innerHTML: "<b>X</b>"};
                });
                $s.data = data[1];
            })
            //.done(function() {
            //console.log( "second success" );
            //})
            //.fail(function() {
            //console.log( "error" );
            //})
            //.always(function() {
            //console.log( "complete" );
            //});
        }
        document.addEventListener("DOMContentLoaded",function(){
            $.getJSON("<?= Url::to('table/models') ?>", function(models){
                $s.models = models;
                for (var key in models){
                    readModelData(key);
                    break;
                }
                document.getElementById('models').onchange = function(){
                    readModelData(this.value);
                }
            });
        });
    </script>
    <script>(function () {
            'use strict';

            var findToolbar = function () {
                    return document.querySelector('#yii-debug-toolbar');
                },
                ajax = function (url, settings) {
                    var xhr = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                    settings = settings || {};
                    xhr.open(settings.method || 'GET', url, true);
                    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                    xhr.setRequestHeader('Accept', 'text/html');
                    xhr.onreadystatechange = function (state) {
                        if (xhr.readyState === 4) {
                            if (xhr.status === 200 && settings.success) {
                                settings.success(xhr);
                            } else if (xhr.status != 200 && settings.error) {
                                settings.error(xhr);
                            }
                        }
                    };
                    xhr.send(settings.data || '');
                },
                url,
                div,
                toolbarEl = findToolbar(),
                toolbarAnimatingClass = 'yii-debug-toolbar_animating',
                barSelector = '.yii-debug-toolbar__bar',
                viewSelector = '.yii-debug-toolbar__view',
                blockSelector = '.yii-debug-toolbar__block',
                toggleSelector = '.yii-debug-toolbar__toggle',
                externalSelector = '.yii-debug-toolbar__external',

                CACHE_KEY = 'yii-debug-toolbar',
                ACTIVE_STATE = 'active',

                animationTime = 300,

                activeClass = 'yii-debug-toolbar_active',
                iframeActiveClass = 'yii-debug-toolbar_iframe_active',
                iframeAnimatingClass = 'yii-debug-toolbar_iframe_animating',
                titleClass = 'yii-debug-toolbar__title',
                blockClass = 'yii-debug-toolbar__block',
                blockActiveClass = 'yii-debug-toolbar__block_active',
                requestStack = [];

            if (toolbarEl) {
                url = toolbarEl.getAttribute('data-url');

                ajax(url, {
                    success: function (xhr) {
                        div = document.createElement('div');
                        div.innerHTML = xhr.responseText;

                        toolbarEl.parentNode && toolbarEl.parentNode.replaceChild(div, toolbarEl);

                        showToolbar(findToolbar());
                    },
                    error: function (xhr) {
                        toolbarEl.innerHTML = xhr.responseText;
                    }
                });
            }

            function showToolbar(toolbarEl) {
                var barEl = toolbarEl.querySelector(barSelector),
                    viewEl = toolbarEl.querySelector(viewSelector),
                    toggleEl = toolbarEl.querySelector(toggleSelector),
                    externalEl = toolbarEl.querySelector(externalSelector),
                    blockEls = barEl.querySelectorAll(blockSelector),
                    iframeEl = viewEl.querySelector('iframe'),
                    iframeHeight = function () {
                        return (window.innerHeight * 0.7) + 'px';
                    },
                    isIframeActive = function () {
                        return toolbarEl.classList.contains(iframeActiveClass);
                    },
                    showIframe = function (href) {
                        toolbarEl.classList.add(iframeAnimatingClass);
                        toolbarEl.classList.add(iframeActiveClass);

                        iframeEl.src = externalEl.href = href;
                        viewEl.style.height = iframeHeight();
                        setTimeout(function() {
                            toolbarEl.classList.remove(iframeAnimatingClass);
                        }, animationTime);
                    },
                    hideIframe = function () {
                        toolbarEl.classList.add(iframeAnimatingClass);
                        toolbarEl.classList.remove(iframeActiveClass);
                        removeActiveBlocksCls();

                        externalEl.href = '#';
                        viewEl.style.height = '';
                        setTimeout(function() {
                            toolbarEl.classList.remove(iframeAnimatingClass);
                        }, animationTime);
                    },
                    removeActiveBlocksCls = function () {
                        [].forEach.call(blockEls, function (el) {
                            el.classList.remove(blockActiveClass);
                        });
                    },
                    toggleToolbarClass = function (className) {
                        toolbarEl.classList.add(toolbarAnimatingClass);
                        if (toolbarEl.classList.contains(className)) {
                            toolbarEl.classList.remove(className);
                        } else {
                            toolbarEl.classList.add(className);
                        }
                        setTimeout(function () {
                            toolbarEl.classList.remove(toolbarAnimatingClass);
                        }, animationTime);
                    },
                    toggleStorageState = function (key, value) {
                        if (window.localStorage) {
                            var item = localStorage.getItem(key);

                            if (item) {
                                localStorage.removeItem(key);
                            } else {
                                localStorage.setItem(key, value);
                            }
                        }
                    },
                    restoreStorageState = function (key) {
                        if (window.localStorage) {
                            return localStorage.getItem(key);
                        }
                    },
                    togglePosition = function () {
                        if (isIframeActive()) {
                            hideIframe();
                        } else {
                            toggleToolbarClass(activeClass);
                            toggleStorageState(CACHE_KEY, ACTIVE_STATE);
                        }
                    };

                toolbarEl.style.display = 'block';

                if (restoreStorageState(CACHE_KEY) == ACTIVE_STATE) {
                    toolbarEl.classList.add(activeClass);
                }

                window.onresize = function () {
                    if (toolbarEl.classList.contains(iframeActiveClass)) {
                        viewEl.style.height = iframeHeight();
                    }
                };

                barEl.onclick = function (e) {
                    var target = e.target,
                        block = findAncestor(target, blockClass);

                    if (block && !block.classList.contains(titleClass)
                        && e.which !== 2 && !e.ctrlKey // not mouse wheel and not ctrl+click
                    ) {
                        while (target !== this) {
                            if (target.href) {
                                removeActiveBlocksCls();
                                block.classList.add(blockActiveClass);
                                showIframe(target.href);
                            }
                            target = target.parentNode;
                        }

                        e.preventDefault();
                    }
                };

                toggleEl.onclick = togglePosition;
            }

            function findAncestor(el, cls) {
                while ((el = el.parentElement) && !el.classList.contains(cls));
                return el;
            }

            function renderAjaxRequests() {
                var requestCounter = document.getElementsByClassName('yii-debug-toolbar__ajax_counter');
                if (!requestCounter.length) {
                    return;
                }
                var ajaxToolbarPanel = document.querySelector('.yii-debug-toolbar__ajax');
                var tbodies = document.getElementsByClassName('yii-debug-toolbar__ajax_requests');
                var state = 'ok';
                if (tbodies.length) {
                    var tbody = tbodies[0];
                    var rows = document.createDocumentFragment();
                    if (requestStack.length) {
                        var firstItem = requestStack.length > 20 ? requestStack.length - 20 : 0;
                        for (var i = firstItem; i < requestStack.length; i++) {
                            var request = requestStack[i];
                            var row = document.createElement('tr');
                            rows.appendChild(row);

                            var methodCell = document.createElement('td');
                            methodCell.innerHTML = request.method;
                            row.appendChild(methodCell);

                            var statusCodeCell = document.createElement('td');
                            var statusCode = document.createElement('span');
                            if (request.statusCode < 300) {
                                statusCode.setAttribute('class', 'yii-debug-toolbar__ajax_request_status yii-debug-toolbar__label_success');
                            } else if (request.statusCode < 400) {
                                statusCode.setAttribute('class', 'yii-debug-toolbar__ajax_request_status yii-debug-toolbar__label_warning');
                            } else {
                                statusCode.setAttribute('class', 'yii-debug-toolbar__ajax_request_status yii-debug-toolbar__label_error');
                            }
                            statusCode.textContent = request.statusCode || '-';
                            statusCodeCell.appendChild(statusCode);
                            row.appendChild(statusCodeCell);

                            var pathCell = document.createElement('td');
                            pathCell.className = 'yii-debug-toolbar__ajax_request_url';
                            pathCell.innerHTML = request.url;
                            pathCell.setAttribute('title', request.url);
                            row.appendChild(pathCell);

                            var durationCell = document.createElement('td');
                            durationCell.className = 'yii-debug-toolbar__ajax_request_duration';
                            if (request.duration) {
                                durationCell.innerText = request.duration + " ms";
                            } else {
                                durationCell.innerText = '-';
                            }
                            row.appendChild(durationCell);
                            row.appendChild(document.createTextNode(' '));

                            var profilerCell = document.createElement('td');
                            if (request.profilerUrl) {
                                var profilerLink = document.createElement('a');
                                profilerLink.setAttribute('href', request.profilerUrl);
                                profilerLink.innerText = request.profile;
                                profilerCell.appendChild(profilerLink);
                            } else {
                                profilerCell.innerText = 'n/a';
                            }
                            row.appendChild(profilerCell);

                            if (request.error) {
                                if (state !== "loading" && i > requestStack.length - 4) {
                                    state = 'error';
                                }
                            } else if (request.loading) {
                                state = 'loading'
                            }
                            row.className = 'yii-debug-toolbar__ajax_request';
                        }
                        while (tbody.firstChild) {
                            tbody.removeChild(tbody.firstChild);
                        }
                        tbody.appendChild(rows);
                    }
                    ajaxToolbarPanel.style.display = 'block';
                }
                requestCounter[0].innerText = requestStack.length;
                var className = 'yii-debug-toolbar__label yii-debug-toolbar__ajax_counter';
                if (state == 'ok') {
                    className += ' yii-debug-toolbar__label_success';
                } else if (state == 'error') {
                    className += ' yii-debug-toolbar__label_error';
                }
                requestCounter[0].className = className;
            };

            var proxied = XMLHttpRequest.prototype.open;

            XMLHttpRequest.prototype.open = function (method, url, async, user, pass) {
                var self = this;
                /* prevent logging AJAX calls to static and inline files, like templates */
                if (url.substr(0, 1) === '/' && !url.match(new RegExp("{{ excluded_ajax_paths }}"))) {
                    var stackElement = {
                        loading: true,
                        error: false,
                        url: url,
                        method: method,
                        start: new Date()
                    };
                    requestStack.push(stackElement);
                    this.addEventListener("readystatechange", function () {
                        if (self.readyState == 4) {
                            stackElement.duration = self.getResponseHeader("X-Debug-Duration") || new Date() - stackElement.start;
                            stackElement.loading = false;
                            stackElement.statusCode = self.status;
                            stackElement.error = self.status < 200 || self.status >= 400;
                            stackElement.profile = self.getResponseHeader("X-Debug-Tag");
                            stackElement.profilerUrl = self.getResponseHeader("X-Debug-Link");
                            renderAjaxRequests();
                        }
                    }, false);
                    renderAjaxRequests();
                }
                proxied.apply(this, Array.prototype.slice.call(arguments));
            };

        })();</script><script src="/assets/b3a26e21/jquery.js"></script>
    <script src="/assets/fd9686d9/yii.js"></script>
    <script src="/assets/4e1fec95/js/bootstrap.js"></script>
</head>
<body>
<?php $this->beginBody() ?>
<?  ?>

<div class="wrap">
    <?php
    Yii::$app->user->isGuest ? (
    NavBar::begin([
        'brandLabel' => 'Planner',
        'brandUrl' => ['site/index'],
        'options' => [
            'id' => 'custom-bootstrap-menu',
            'class' => 'navbar-default navbar-fixed-top',
        ],
    ])
    ) : (
    NavBar::begin([
        'brandLabel' => 'Planner',
        'brandUrl' => ['/user/personal-area'],
        'options' => [
            'id' => 'custom-bootstrap-menu',
            'class' => 'navbar-default navbar-fixed-top',
        ],
    ])
    );

    echo Nav::widget([
        'options' => ['class' => 'nav navbar-nav navbar-right', 'id' => 'navbarnav'],
        'items' => [
            Yii::$app->user->isGuest ? (
            ['label' => '', 'url' => ['#']]
            ) : (
            ['label' => 'Personal Area', 'url' => ['/user/personal-area']]
            ),
            Yii::$app->user->isGuest ? (
            ['label' => 'Home', 'url' => ['/site/index']]
            ) : (
            ['label' => 'My Tasks', 'url' => ['/task/my-tasks']]
            ),
            Yii::$app->user->isGuest ? (
            ['label' => 'Register', 'url' => ['/user/signup']]
            ) : (
            ['label' => 'Notice ' . Html::tag('span', 0, ['class' => 'badge', 'id' => 'baddge']),
                'items' => [
                    ['label' => '', 'url' => '#'],
                    // ['label' => 'Notice 2', 'url' => '#'],
                ],
            ]
            ),
            Yii::$app->user->isGuest ? (
            ['label' => 'Login', 'url' => ['/user/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/user/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            ),
        ],
        'encodeLabels' => false ,

    ]);

    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>
        <!-- <p class="pull-right"><?= Yii::powered() ?></p> -->
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
