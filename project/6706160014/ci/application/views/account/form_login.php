<h1>Silahkan Login</h1>
<fieldset>
        <?php echo validation_errors(); ?>
        <p style="color:red;"><?php echo $this->session->flashdata('notification')?></p>
        <?php echo form_open('account/login')?>
        
        Username : <input type="text" name="username" value="<?php echo set_value('username')?>"> <br><br> 
        Password : <input type="password" name="password" value="<?php echo set_value('password')?>"> <br><br>
        <input type="submit" name="masuk" value="Masuk"> <br>
    </form>
</fieldset>