<div class="menu-capsule">
    <div class="menu-inner">
        <div class="menu-left">
            <div class="menu-left-top">
                <img src="/assets/icons/phone.svg" />
                <span>ALO ÇÖZÜM HATTI</span>
                <span><strong>444 35 66</strong></span>
            </div>
            <div class="menu-row-divider"></div>
            <div class="menu-left-bottom">
                <?= $kategoriler[0] ?>
                <div class="menu-column-divider"></div>
                <?= $kategoriler[1] ?>
                <div class="menu-column-divider"></div>
                <?= $kategoriler[2] ?>
            </div>
        </div>

        <a href="/ana-sayfa"><div class="menu-logo">
            <img class="logo" src="/assets/images/konak_logo.svg" alt="Konak Belediyesi Logo" />
        </div></a>

        <div class="menu-right">
            <div class="menu-right-capsule">
                <div class="menu-right-top">
                    <span><strong>19°C</strong></span>
                    <img src="/assets/icons/weather/weather_party_cloudy.svg" />
                    <span><?php echo $time_text;?></span>
                </div>
                <div class="menu-row-divider"></div>
                <div class="menu-right-bottom">
                    <?= $kategoriler[3] ?>
                    <div class="menu-column-divider"></div>
                    <?= $kategoriler[4] ?>
                    <div class="menu-column-divider"></div>
                    <?= $kategoriler[5] ?>
                </div>
            </div>
            <div class="Atam">
                <img src="/assets/images/Atam.png" />
            </div>
        </div>
    </div>
</div>

<div class="menu-dropdowns">
    <?php foreach ($dropdowns as $dropdown): ?>
        <?= $dropdown ?>
    <?php endforeach; ?>
</div>
