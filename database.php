<?php
class DB{
    private $host;
    private $user;
    private $pass;
    private $db;
    private $charset;
    private $pdo;

    public function __construct($host, $user, $pass, $db, $charset){
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->db = $db;
        $this->charset = $charset; 
        
     

        try{
            $dsn = 'mysql:host='. $this->host.';dbname='.$this->db.';charset='.$this->charset;
            $this->pdo = new PDO($dsn, $this->user, $this->pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $this->pdo;
        }
        catch(\PDOException $e){
            echo "Connection Failed: ".$e->getMessage();
        }

      
    }

                public function login($gebruikersnaam, $wachtwoord){
                    $sql="SELECT * FROM medewerker WHERE gebruikersnaam = :gebruikersnaam";

                    $stmt = $this->pdo->prepare($sql); 
                    $stmt->execute(['gebruikersnaam'=>$gebruikersnaam]); 

                    $result = $stmt->fetch(PDO::FETCH_ASSOC); 

                    if($result){
                        echo 'account gevonden';
                        if ($wachtwoord == $result["wachtwoord"]) {
                            echo 'ww komt overeen';
                            // Start the session
                            SESSION_START();
                            
                            $_SESSION['gebruikersnaam'] = $result;

                            header("location: overzichten.php");
                        } else {
                            echo "Invalid Password!";
                        }
                    } else {
                        echo "Invalid Login";
                    }

                }

                //Het reserveringsoverzicht op de website krijgen
                public function showReservering(){
                    try {
                        // SELECT * FROM "OVERZICHT" JOIN "tabel klant" ON "tabel.placeholder/foreignkey" = "tabel.primarykey"";
                        $query = "SELECT * FROM reserveringen JOIN klanten ON reserveringen.klantenID_ph = klanten.klantenID ";
                        
                        $prep = $this->pdo->prepare($query);
            
                        $prep->execute();
            
                        $rows = $prep->fetchAll(PDO::FETCH_ASSOC);
                        
                        return $rows;
                    } catch (\Throwable $th) {
                        throw $th;
                    }
                }

                //Laat alles in tabel klanten op de website zien
                public function showKlant(){
                    try {

                        $query = "SELECT * FROM klanten";

                        $prep = $this->pdo->prepare($query);

                        $prep->execute();

                        $rows = $prep->fetchAll(PDO::FETCH_ASSOC);

                        return $rows;
                    } catch (\Throwable $th) {
                        
                        throw $th;
                    }
                }

                public function selectSpecificKlant($klantedit){
                    try {
                        $query = "SELECT * FROM klanten WHERE klantenID = :klantenID;";
            
                        $prep = $this->pdo->prepare($query);
            
                        $prep->execute([
                            'klantenID' =>$klantedit
                        ]);
            
                        $row = $prep->fetch(PDO::FETCH_ASSOC);
                    
                        return $row;
                    } catch (\Throwable $th) {
                        throw $th;
                    }
                }

                public function updateKlant($klantenID, $naam, $telefoon, $email){
                    try {
                        $query = "UPDATE klanten SET naam = :naam, telefoon = :telefoon, email = :email WHERE klantenID = :klantenID;";
            
                        $prep = $this->pdo->prepare($query);
            
                        $prep->execute([
                            'klantenID' => $klantenID,
                            'naam' => $naam,
                            'telefoon' => $telefoon,
                            'email' => $email
                        ]);
            
                        header('Location: klant.php');
            
                        exit;
                    } catch (\Throwable $th) {
                        throw $th;
                    }
                }

                                
                 public function showKlantenReservering(){
                    try {

                    $query = "SELECT * FROM reserveringen JOIN klanten ON reserveringen.klantenID_ph = klanten.klantenID ORDER BY reserveringenID DESC LIMIT 1";
                                        
                    $prep = $this->pdo->prepare($query);
                
                    $prep->execute();
                            
                    $rows = $prep->fetchAll(PDO::FETCH_ASSOC);
                                     
                         return $rows;
                     } catch (\Throwable $th) {
                          throw $th;
                     }
                }

                public function selectSpecificReservering($reserveringedit){
                    try {
                        $query = "SELECT * FROM reserveringen JOIN klanten ON reserveringen.klantenID_ph = klanten.klantenID WHERE reserveringenID = :reserveringenID;";
            
                        $prep = $this->pdo->prepare($query);
            
                        $prep->execute([
                            'reserveringenID' =>$reserveringedit
                        ]);
            
                        $row = $prep->fetch(PDO::FETCH_ASSOC);
                    
                        return $row;
                    } catch (\Throwable $th) {
                        throw $th;
                    }
                }

                public function updateReservering($reserveringenID, $datum, $tijd, $tafel, $naam, $telefoon, $aantal){
                    try {
                        $query = "UPDATE reserveringen  JOIN klanten ON reserveringen.klantenID_ph = klanten.klantenID  SET datum = :datum, tijd = :tijd, tafel = :tafel, naam = :naam, telefoon = :telefoon, aantal = :aantal WHERE reserveringenID = :reserveringenID;";
            
                        $prep = $this->pdo->prepare($query);
            
                        $prep->execute([
                            'reserveringenID' => $reserveringenID,
                            'datum' => $datum,
                            'tijd' => $tijd,
                            'tafel' => $tafel,
                            'naam' => $naam,
                            'telefoon' => $telefoon,
                            'aantal' => $aantal
                        ]);
            
                        header('Location: reserveren.php');
            
                        exit;
                    } catch (\Throwable $th) {
                        throw $th;
                    }
                }


                public function createReservering($naam, $telefoon, $email, $datum, $tijd, $aantal, $tafel, $allergieen, $opmerkingen){

                    $query = "INSERT INTO klanten(naam, telefoon, email) VALUES (:naam, :telefoon, :email);";
        

                    $stmt = $this->pdo->prepare($query);
        

                    $stmt->execute([
                        'naam'=>$naam,
                        'telefoon'=>$telefoon,
                        'email'=>$email
                    ]);
        

                    $klantenID = $this->pdo->lastInsertId();
        

                    $query = "INSERT INTO reserveringen(datum, tijd, aantal, tafel, allergieen, opmerkingen, klantenID_ph) VALUES (:datum, :tijd, :aantal, :tafel, :allergieen, :opmerkingen, :klantenID_ph)";
        
            
                    $stmt = $this->pdo->prepare($query);
        

                    $stmt->execute([
                        'datum'=>$datum,
                        'tijd'=>$tijd,
                        'aantal'=>$aantal,
                        'tafel'=>$tafel,
                        'allergieen'=>$allergieen,
                        'opmerkingen'=>$opmerkingen,
                        'klantenID_ph'=>$klantenID
                    ]);
        
                    header("Location: reservering.php");
        
                }

                public function showDrank(){
                    try {

                    $query = "SELECT * FROM gerechtsoorten JOIN menuitems ON gerechtsoorten.gerechtsoortenID = menuitems.gerechtsoortenID_ph WHERE gerechtscategorienID_ph = 1";
                                        
                    $prep = $this->pdo->prepare($query);
                
                    $prep->execute();
                            
                    $rows = $prep->fetchAll(PDO::FETCH_ASSOC);
                                     
                         return $rows;
                     } catch (\Throwable $th) {
                          throw $th;
                     }
                }

                public function showEten(){
                    try {

                    $query = "SELECT * FROM gerechtsoorten JOIN menuitems ON gerechtsoorten.gerechtsoortenID = menuitems.gerechtsoortenID_ph WHERE NOT gerechtscategorienID_ph = 1";
                                        
                    $prep = $this->pdo->prepare($query);
                
                    $prep->execute();
                            
                    $rows = $prep->fetchAll(PDO::FETCH_ASSOC);
                                     
                         return $rows;
                     } catch (\Throwable $th) {
                          throw $th;
                     }
                }

                
                public function showHoofd(){
                    try {

                    $query = "SELECT * FROM gerechtscategorien";
                                        
                    $prep = $this->pdo->prepare($query);
                
                    $prep->execute();
                            
                    $rows = $prep->fetchAll(PDO::FETCH_ASSOC);
                                     
                         return $rows;
                     } catch (\Throwable $th) {
                          throw $th;
                     }
                }

                public function showSub(){
                    try {

                    $query = "SELECT * FROM gerechtscategorien WHERE NOT gerechtscategorieID = 1";
                                        
                    $prep = $this->pdo->prepare($query);
                
                    $prep->execute();
                            
                    $rows = $prep->fetchAll(PDO::FETCH_ASSOC);
                                     
                         return $rows;
                     } catch (\Throwable $th) {
                          throw $th;
                     }
                }

                public function showKok(){
                    try {

                    $query = "SELECT * FROM bestellingen JOIN reserveringen ON bestellingen.reserveringenID_ph = reserveringen.reserveringenID 
                    JOIN menuitems ON bestellingen.menuitemsID_ph = menuitems.menuitemsID WHERE code = 'kok'";
                                        
                    $prep = $this->pdo->prepare($query);
                
                    $prep->execute();
                            
                    $rows = $prep->fetchAll(PDO::FETCH_ASSOC);
                                     
                         return $rows;
                     } catch (\Throwable $th) {
                          throw $th;
                     }
                }

                //verwijder de reservering
        function deleteReservering($reserveringsID){
            //een query die alles verwijdert in de reserveringen tabel en klant tabel voor de geselecteerde reservering met behulp van de ID
            $query = "DELETE reserveringen, klanten FROM reserveringen JOIN klanten on reserveringen.klantenID_ph = klanten.klantenID
                WHERE reserveringenID = :reserveringenID;";

            //je prepared de query
            $statement = $this->pdo->prepare($query);

            //je execute het
            //je assigned de kolom namen waar het in moet met de parameters.
            $statement->execute([
                'reserveringenID' => $reserveringsID
            ]);

            //zodra alles is verstuurd gaat het terug naar de reservatie overzicht
            header("Location: reserveren.php");

            //deze functie wordt gebruikt op pagina(s): //
            // - reservatie_edit.php                    //
            // - reservatie_delete.php                  //
            //zie verdere uitleg op pagina(s):          //
            // - reservatie_edit.php                    //
            // - reservatie_delete.php                  //
        }

        public function deleteKlant($klantenID){
            //een query die alles verwijdert in de reserveringen tabel en klant tabel voor de geselecteerde reservering met behulp van de ID
            $query = "DELETE reserveringen, klanten FROM reserveringen JOIN klanten on reserveringen.klantenID_ph = klanten.klantenID
                WHERE reserveringenID = :reserveringenID; AND klanten.klant_ID = reserveringen.klant_ID";

            //je prepared de query
            $statement = $this->pdo->prepare($query);

            //je execute het
            //je assigned de kolom namen waar het in moet met de parameters.
            $statement->execute([
                'reserveringenID' => $klantenID
            ]);

            //zodra alles is verstuurd gaat het terug naar de reservatie overzicht
            header("Location: klant.php");

            //deze functie wordt gebruikt op pagina(s): //
            // - reservatie_edit.php                    //
            // - reservatie_delete.php                  //
            //zie verdere uitleg op pagina(s):          //
            // - reservatie_edit.php                    //
            // - reservatie_delete.php                  //
        }
            
}