<?php /* Smarty version 2.6.26, created on 2010-05-30 11:02:15
         compiled from autenticazione_default.tpl */ ?>
        <a id="anchor-login-4"></a>
        <div class="corner-subcontent-top"></div>
        <div class="subcontent-box">
          <h1 class="login">Login</h1>
          <div class="loginform">
            <p id="error"><?php echo $this->_tpl_vars['errore']; ?>
</p>
            <br />
            <form method="post" action="index.php">
              <p><input type="hidden" name="rememberme" value="0" /></p>
              <p><input type="hidden" name="controller" value="autenticazione" /></p>
              <p><input type="hidden" name="task" value="autentica" /></p>
              <fieldset>
                <p><label for="username" class="top">Nome utente:</label><br />
                  <input type="text" name="username" id="username" tabindex="1" class="field" value="" /></p>
              <p><label for="password" class="top">Password:</label><br />
                  <input type="password" name="password" id="password" tabindex="2" class="field" value="" /></p>
              <p><input type="checkbox" name="checkbox" id="checkbox" class="checkbox" tabindex="3" size="1" value="" /><label for="checkbox" class="right">Ricordati?</label></p>
              <p><input type="submit" name="cmdweblogin" class="button" value="LOGIN"  /></p>
              <p><a href="?controller=autenticazione&task=password_dimenticata" id="forgotpsswd">Password dimenticata?</a></p>
            </fieldset>
            </form>
          </div>
        </div>
        <div class="corner-subcontent-bottom"></div>