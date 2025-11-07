 <div class="main-content">
     <div class="auth-container">
         <h2>Connexion</h2>

         <form method="post" action="">
             <div class="form-group">
                 <label for="login">Login :</label>
                 <input type="text" id="login" name="login" required placeholder="Entrez votre login">
             </div>

             <div class="form-group">
                 <label for="password">Mot de passe :</label>
                 <input type="password" id="password" name="password" required placeholder="Entrez votre mot de passe">
             </div>

             <button type="submit" class="btn">Se connecter</button>

             <p class="switch-link">
                 Pas encore de compte ? <a href="/auth/register">S'inscrire</a>
             </p>
         </form>
     </div>
 </div>