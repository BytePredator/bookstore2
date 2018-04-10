<?php /* Smarty version 2.6.26, created on 2010-06-06 10:18:07
         compiled from registrazione_email_attivazione.tpl */ ?>
Ciao <?php echo $this->_tpl_vars['nome_cognome']; ?>
,

Grazie per esserti registrato su BookStore. Prima di attivare il tuo account e' necessario compiere un ultimo passaggio per completare la registrazione!

Nota bene:  devi completare questo passaggio per diventare un utente registrato. Sara'  necessario cliccare sul link una sola vota e il tuo account verra'; automaticamente aggiornato.

Per completare la registrazione, clicca sul collegamento qui sotto:
<?php echo $this->_tpl_vars['url']; ?>
index.php?controller=registrazione&task=attivazione&codice_attivazione=<?php echo $this->_tpl_vars['codice_attivazione']; ?>
&username=<?php echo $this->_tpl_vars['username']; ?>


**** Il collegamento non funziona? ****
Se il collegamento non dovesse funzionare, visita questo link:
<?php echo $this->_tpl_vars['url']; ?>
index.php?controller=registrazione&task=attivazione

Assicurati di non aggiungere spazi aggiuntivi. Dovrai scrivere il tuo username e codice di attivazione nella pagina che apparira';  cliccando sul collegamento qui sopra.

Il tuo username e': <?php echo $this->_tpl_vars['username']; ?>

Il tuo codice di attivazione e': <?php echo $this->_tpl_vars['codice_attivazione']; ?>



In caso di problemi con la registrazione contatta un membro del nostro staff all'indirizzo: <?php echo $this->_tpl_vars['email_webmaster']; ?>


Saluti, lo staff di
BookStore