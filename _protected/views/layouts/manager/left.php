<aside class="main-sidebar">
  <section class="sidebar">

    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="https://secure.gravatar.com/avatar/49b4b3198e690faafc28a7ef6753e70f?s=64" class="img-circle" alt="User Image"/>
      </div>
      <div class="pull-left info">
        <p>Rashad Aliyev</p>

        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <?= dmstr\widgets\Menu::widget(
      [
        'options' => ['class' => 'sidebar-menu'],
        'items' => [
          ['label' => 'Hotels', 'options' => ['class' => 'header']],
          ['label' => 'Hotels', 'icon' => 'fa fa-building', 'url' => ['/hotel/index']],
          ['label' => 'Amenity', 'icon' => 'fa fa-gear', 'url' => ['/amenity/index']],

          ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
          ['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii']],
          ['label' => 'Debug', 'icon' => 'fa fa-dashboard', 'url' => ['/debug']],
          ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
        ],
      ]
    ) ?>

  </section>
</aside>
