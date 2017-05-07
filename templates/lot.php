<?php
$lot = $data['lot'];
?>

<main>
  <nav class="nav">
    <ul class="nav__list container">
      <li class="nav__item">
        <a href="">Доски и лыжи</a>
      </li>
      <li class="nav__item">
        <a href="">Крепления</a>
      </li>
      <li class="nav__item">
        <a href="">Ботинки</a>
      </li>
      <li class="nav__item">
        <a href="">Одежда</a>
      </li>
      <li class="nav__item">
        <a href="">Инструменты</a>
      </li>
      <li class="nav__item">
        <a href="">Разное</a>
      </li>
    </ul>
  </nav>
  <section class="lot-item container">
    <h2><?= $lot['title'] ?></h2>
    <div class="lot-item__content">
      <div class="lot-item__left">
        <div class="lot-item__image">
          <img src=<?= $lot['url'] ?> width="730" height="548" alt="">
        </div>
        <p class="lot-item__category">Категория: <span><?= $lot['category'] ?></span></p>
        <p class="lot-item__description"><?= $lot['description'] ?></p>
      </div>
      <div class="lot-item__right">
      <?php if (isset($_SESSION['user'])): ?>
        <div class="lot-item__state">
          <div class="lot-item__timer timer">
            10:54:12
          </div>
          <div class="lot-item__cost-state">
            <div class="lot-item__rate">
              <span class="lot-item__amount">Текущая цена</span>
              <span class="lot-item__cost"><?= $lot['price'] ?></span>
            </div>
            <div class="lot-item__min-cost">
              Мин. ставка <span>12 000 р</span>
            </div>
          </div>
          <form class="lot-item__form" action="https://echo.htmlacademy.ru" method="post">
            <p class="lot-item__form-item">
              <label for="cost">Ваша ставка</label>
              <input id="cost" type="number" name="cost" placeholder="12 000">
            </p>
            <button type="submit" class="button">Сделать ставку</button>
          </form>
        </div>
      <?php endif; ?>
        <div class="history">
          <h3>История ставок (<span>4</span>)</h3>
          <table class="history__list">
            <?php foreach ($data['bets'] as $bet): ?>
            <tr class="history__item">
              <td class="history__name"><?= $bet['name'] ?></td>
              <td class="history__price"><?= $bet['price'] ?></td>
              <td class="history__time"><?= formatTime($bet['ts']) ?></td>
            </tr>
            <?php endforeach; ?>
          </table>
        </div>
      </div>
    </div>
  </section>
</main>