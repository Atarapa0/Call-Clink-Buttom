<?php
/*
Plugin Name: Telefon Numarası
Plugin URI: Eklenti linki
Description: Kullanıcını telefon girmesini sağlamak
Version: 3.0
Author: Furkan Erdoğan v(Atarapa0)
Author URI: https://furkanerdogan.vercel.app
License: GNU
*/

// Admin menüsüne telefon ekleme sayfası ekleniyor
add_action("admin_menu","TelefonEklemeAdminMenu");
function TelefonEklemeAdminMenu(){
    add_menu_page("Telefon Ekleme","Telefon Ekleme Ayarlari","manage_options","telefon-settings","telefoneklemadminfunction");
}

/*
//if (isset($_POST["birincitelefonnumarasionay"]))
if ($_POST['birincitelefonnumarasionay'] == 'value1') {?>
    <?php
    function llchead_add_head_code() {
    ?>
    <a href="tel:<?php echo get_option('birincitelefonnumarasi');?>" class="float llc-button">
            <i class="fa fa-phone"></i>
            </a>
            <div class="label-container llc-button">
            <div> <?php echo get_option('birincitelefonismi'); ?></div>
            </div></a>
            <a href="tel:<?php echo get_option('ikincitelefonnumarasi'); ?>" class="float1 llc-button">
                <i class="fa fa-phone"></i>
                </a>
                <div class="label-container1 llc-button">
                
                <?php echo get_option('ikincitelefonismi'); ?></div>
                </div></a>
            
               
                <?php
    }
    ?>
    
    <?php add_action('wp_head', 'llchead_add_head_code');  ?>
    <?php
    
    

}//elseif (isset($_POST['onay2'])){
?>
<?php
//}
else{ ?>
 <?php
    function llchead_add_head_code() {
    ?>
    </div></a>
            <a href="tel:<?php echo get_option('ikincitelefonnumarasi'); ?>" class="float1 llc-button">
                <i class="fa fa-phone"></i>
                </a>
                <div class="label-container1 llc-button">
                
                <?php echo get_option('ikincitelefonismi'); ?></div>
                </div></a>
               
                <?php
    }
    ?>
    
    <?php add_action('wp_head', 'llchead_add_head_code');  ?>
    <?php

}
*/

// Admin panel fonksiyonu - telefon numaralarının yönetimi için
function telefoneklemadminfunction(){
    // Form gönderildi mi kontrolü
    if(isset($_POST["action"]) && $_POST["action"]=="update"){
        // Güvenlik kontrolü
        if(!isset($_POST["telefonEklenti"]) || ! wp_verify_nonce($_POST["telefonEklenti"], 'telefonEklenti')){
            echo '<div class="error"><p>Güvenlik doğrulaması başarısız!</p></div>';
            return;
        }
        
        // Telefon numaralarını güncelle
        if(isset($_POST["birincitelefonnumarasi"])) {
            $birincitelefonnumarasi = sanitize_text_field($_POST["birincitelefonnumarasi"]);
            update_option('birincitelefonnumarasi', $birincitelefonnumarasi);
        }

        if(isset($_POST["birincitelefonismi"])) {
            $birincitelefonismi = sanitize_text_field($_POST["birincitelefonismi"]);
            update_option('birincitelefonismi', $birincitelefonismi);
        }

        if(isset($_POST["ikincitelefonnumarasi"])) {
            $ikincitelefonnumarasi = sanitize_text_field($_POST["ikincitelefonnumarasi"]);
            update_option('ikincitelefonnumarasi', $ikincitelefonnumarasi);
        }

        if(isset($_POST["ikincitelefonismi"])) {
            $ikincitelefonismi = sanitize_text_field($_POST["ikincitelefonismi"]);
            update_option('ikincitelefonismi', $ikincitelefonismi);
        }

        // Checkbox durumlarını kaydet
        update_option('telefon1_goster', isset($_POST["onay1"]) ? '0' : '1');
        update_option('telefon2_goster', isset($_POST["ikincitelefonnumarasionay"]) ? '0' : '1');

        echo '<div class="updated"><p>Ayarlar başarıyla güncellendi!</p></div>';
    }

    // Admin panel form yapısı
    ?>
    <form action="" method="post">
        <?php wp_nonce_field('telefonEklenti','telefonEklenti'); ?>
        <?php echo get_option('birincitelefonnumarasi'); ?> 
        <br>
        <label for="">1.Telefon Numarası : </label>
        <input type="number" name="birincitelefonnumarasi" placeholder="1.Telefon Numarası">
        <input type="checkbox" name= "onay1" value1='onay1' /> 1. Telefon Çubuğunu Kaldır</label><br/>
        <br>
        <?php echo get_option('birincitelefonismi'); ?>
        <br>
        <label for="">1.Telefon ismi : </label>
        <input type="text" name="birincitelefonismi" placeholder="1.Telefon ismi">
        <br>
        <br>
        <?php echo get_option('ikincitelefonnumarasi'); ?>
        <br>
        <label for="">2.Telefon Numaranız : </label>
        <input type="number" name="ikincitelefonnumarasi" placeholder="2.Telefon Numaranız">
        <input type="checkbox" name="ikincitelefonnumarasionay" value="onay2[]"/> 2. Telefon Çubuğunu Kaldır</label><br/>
        <br>
        <?php echo get_option('ikincitelefonismi'); ?>
        <br>
        <label for="">2.Telefon ismi : </label>
        <input type="text" name="ikincitelefonismi" placeholder="2.Telefon ismi">
        <br>
        <input type="hidden" name="action" value="update">
        <br>
        <input type="submit" value="Güncelle">
    </form>
    <?php
}

// Frontend dosyaları dahil ediliyor
// Sağ taraf için
include("frontend/frontend3.php");
include("frontend/frontend4.php");

// Sol taraf için
include("frontend/frontend1.php");
include("frontend/frontend2.php");
     
     
     ?>





  



<?php
function llchead_add_head_code() {
    // Telefon 1 gösterilsin mi kontrolü
    if(get_option('telefon1_goster', '1') == '1') {
        ?>
        <a href="tel:<?php echo esc_attr(get_option('birincitelefonnumarasi')); ?>" class="float llc-button">
            <i class="fa fa-phone"></i>
        </a>
        <div class="label-container llc-button">
            <div><?php echo esc_html(get_option('birincitelefonismi')); ?></div>
        </div>
        <?php
    }

    // Telefon 2 gösterilsin mi kontrolü
    if(get_option('telefon2_goster', '1') == '1') {
        ?>
        <a href="tel:<?php echo esc_attr(get_option('ikincitelefonnumarasi')); ?>" class="float1 llc-button">
            <i class="fa fa-phone"></i>
        </a>
        <div class="label-container1 llc-button">
            <?php echo esc_html(get_option('ikincitelefonismi')); ?>
        </div>
        <?php
    }
}
?>

<?php add_action('wp_head', 'llchead_add_head_code');  ?>




