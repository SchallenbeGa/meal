@extends('layouts.app')

@section('content')
      <!-- Page content -->
      <section class="container pt-5">
        <div class="row">

  
          <!-- Sidebar (User info + Account menu) -->
          @include('user.nav')
          

          <!-- Account details -->
          <div class="col-md-8 offset-lg-1 pb-5 mb-2 mb-lg-4 mt-n3 mt-md-0">
            <div class="ps-md-3 ps-lg-0 mt-md-2 py-md-4">
              <h1 class="h2 pt-xl-1 pb-3">Détails du compte</h1>
              <!-- Basic info -->
              <h2 class="h5 mb-4">Vos informations</h2>
              @if (session('status'))<!-- we should put this on every form so client see how dumb he is -->
                <div class="alert alert-success" role="alert">
                  {{ session('status') }}
                </div>
                @elseif (session('error'))
                <div class="alert alert-danger" role="alert">
                  {{ session('error') }}
                </div>
                @endif
                
              <form method="POST" class="needs-validation border-bottom pb-3 pb-lg-4" action="{{ route('update.profil') }}" novalidate>
              <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                @csrf
                @method('POST')
                <div class="row pb-2">
                  <div class="col-sm-6 mb-4">
                    <label for="fn" class="form-label fs-base">Prénom</label>
                    <input type="text" id="fn" name="firstname" class="form-control form-control-lg" value="{{Auth::user()->firstname}}" required>
                    <div class="invalid-feedback">Veuillez saisir votre prénom</div>
                  </div>
                  <div class="col-sm-6 mb-4">
                    <label for="sn" class="form-label fs-base">Nom</label>
                    <input type="text" id="sn" name="lastname" class="form-control form-control-lg" value="{{Auth::user()->lastname}}" required>
                    <div class="invalid-feedback">Please enter your second name!</div>
                  </div>
                  <div class="col-sm-6 mb-4">
                    <label for="email" class="form-label fs-base">Adresse E-mail</label>
                    <input type="email" id="email" class="form-control form-control-lg" value="{{Auth::user()->email}}" disabled>
                  </div>
                  <div class="col-sm-6 mb-4">
                    <label for="phone" class="form-label fs-base">Téléphone <small class="text-muted">(Optionnel)</small></label>
                    <input type="text" id="phone" name="phone_number" value="{{Auth::user()->phone_number}}" class="form-control form-control-lg" data-format='{"numericOnly": true, "delimiters": ["+41", " ", " "], "blocks": [0, 2, 3, 2, 2]}' placeholder="+41 __ ___ __ __">
                  </div>              

                <!-- Address -->
                <h2 class="h5 pt-1 pt-lg-3 my-4">Adresse</h2>
                  <div class="row pb-2">
                    <div class="col-sm-6 mb-4">
                      <label for="country" class="form-label fs-base">Pays</label>
                      <select id="country" name="country" class="form-select form-select-lg" required>
                        <option value="{{Auth::user()->country}}" disabled>Choisir un pays</option>
                        <option value="CH" {{Auth::user()->country == "CH" ? "selected":""}}>Suisse</option>
                        <option value="FR"{{Auth::user()->country == "FR" ? "selected":""}}>France</option>
                        <option value="BE"{{Auth::user()->country == "BE" ? "selected":""}}>Belgique</option>
                        <option value="AF"{{Auth::user()->country == "AF" ? "selected":""}}>Afghanistan</option>
                        <option value="ZA"{{Auth::user()->country == "ZA" ? "selected":""}}>Afrique du Sud</option>
                        <option value="AL"{{Auth::user()->country == "AL" ? "selected":""}}>Albanie</option>
                        <option value="DZ"{{Auth::user()->country == "DZ" ? "selected":""}}>Algérie</option>
                        <option value="DE"{{Auth::user()->country == "DE" ? "selected":""}}>Allemagne</option>
                        <option value="AD"{{Auth::user()->country == "AD" ? "selected":""}}>Andorre</option>
                        <option value="AO"{{Auth::user()->country == "AO" ? "selected":""}}>Angola</option>
                        <option value="AI"{{Auth::user()->country == "AI" ? "selected":""}}>Anguilla</option>
                        <option value="AQ"{{Auth::user()->country == "AQ" ? "selected":""}}>Antarctique</option>
                        <option value="AG"{{Auth::user()->country == "AG" ? "selected":""}}>Antigua-et-Barbuda</option>
                        <option value="AN"{{Auth::user()->country == "AN" ? "selected":""}}>Antilles néerlandaises</option>
                        <option value="SA"{{Auth::user()->country == "SA" ? "selected":""}}>Arabie saoudite</option>
                        <option value="AR"{{Auth::user()->country == "AR" ? "selected":""}}>Argentine</option>
                        <option value="AM"{{Auth::user()->country == "AM" ? "selected":""}}>Arménie</option>
                        <option value="AW"{{Auth::user()->country == "AW" ? "selected":""}}>Aruba</option>
                        <option value="AU"{{Auth::user()->country == "AU" ? "selected":""}}>Australie</option>
                        <option value="AT"{{Auth::user()->country == "AT" ? "selected":""}}>Autriche</option>
                        <option value="AZ"{{Auth::user()->country == "AZ" ? "selected":""}}>Azerbaïdjan</option>
                        <option value="BS"{{Auth::user()->country == "BS" ? "selected":""}}>Bahamas</option>
                        <option value="BH"{{Auth::user()->country == "BH" ? "selected":""}}>Bahreïn</option>
                        <option value="BD"{{Auth::user()->country == "BD" ? "selected":""}}>Bangladesh</option>
                        <option value="BB"{{Auth::user()->country == "BB" ? "selected":""}}>Barbade</option>
                        <option value="BY"{{Auth::user()->country == "BY" ? "selected":""}}>Bélarus</option>
                        <option value="BE"{{Auth::user()->country == "BE" ? "selected":""}}>Belgique</option>
                        <option value="BZ"{{Auth::user()->country == "BZ" ? "selected":""}}>Belize</option>
                        <option value="BJ"{{Auth::user()->country == "BJ" ? "selected":""}}>Bénin</option>
                        <option value="BM"{{Auth::user()->country == "BM" ? "selected":""}}>Bermudes</option>
                        <option value="BT"{{Auth::user()->country == "BT" ? "selected":""}}>Bhoutan</option>
                        <option value="BO"{{Auth::user()->country == "BO" ? "selected":""}}>Bolivie</option>
                        <option value="BA"{{Auth::user()->country == "BA" ? "selected":""}}>Bosnie-Herzégovine</option>
                        <option value="BW"{{Auth::user()->country == "BW" ? "selected":""}}>Botswana</option>
                        <option value="BR"{{Auth::user()->country == "BR" ? "selected":""}}>Brésil</option>
                        <option value="BN"{{Auth::user()->country == "BN" ? "selected":""}}>Brunei</option>
                        <option value="BG"{{Auth::user()->country == "BG" ? "selected":""}}>Bulgarie</option>
                        <option value="BF"{{Auth::user()->country == "BF" ? "selected":""}}>Burkina Faso</option>
                        <option value="BI"{{Auth::user()->country == "BI" ? "selected":""}}>Burundi</option>
                        <option value="KH"{{Auth::user()->country == "KH" ? "selected":""}}>Cambodge</option>
                        <option value="CM"{{Auth::user()->country == "CM" ? "selected":""}}>Cameroun</option>
                        <option value="CA"{{Auth::user()->country == "CA" ? "selected":""}}>Canada</option>
                        <option value="CV"{{Auth::user()->country == "CV" ? "selected":""}}>Cap-Vert</option>
                        <option value="CL"{{Auth::user()->country == "CL" ? "selected":""}}>Chili</option>
                        <option value="CN"{{Auth::user()->country == "CN" ? "selected":""}}>Chine</option>
                        <option value="CY"{{Auth::user()->country == "CY" ? "selected":""}}>Chypre</option>
                        <option value="CO"{{Auth::user()->country == "CO" ? "selected":""}}>Colombie</option>
                        <option value="KM"{{Auth::user()->country == "KM" ? "selected":""}}>Comores</option>
                        <option value="CG"{{Auth::user()->country == "CG" ? "selected":""}}>Congo</option>
                        <option value="CD"{{Auth::user()->country == "CD" ? "selected":""}}>Congo, République démocratique du</option>
                        <option value="KP"{{Auth::user()->country == "KP" ? "selected":""}}>Corée du Nord</option>
                        <option value="KR"{{Auth::user()->country == "KR" ? "selected":""}}>Corée du Sud</option>
                        <option value="CR"{{Auth::user()->country == "CR" ? "selected":""}}>Costa Rica</option>
                        <option value="CI"{{Auth::user()->country == "CI" ? "selected":""}}>Côte d'Ivoire</option>
                        <option value="HR"{{Auth::user()->country == "HR" ? "selected":""}}>Croatie</option>
                        <option value="CU"{{Auth::user()->country == "CU" ? "selected":""}}>Cuba</option>
                        <option value="DK"{{Auth::user()->country == "DK" ? "selected":""}}>Danemark</option>
                        <option value="DJ"{{Auth::user()->country == "DJ" ? "selected":""}}>Djibouti</option>
                        <option value="DM"{{Auth::user()->country == "DM" ? "selected":""}}>Dominique</option>
                        <option value="EG"{{Auth::user()->country == "EG" ? "selected":""}}>Égypte</option>
                        <option value="AE"{{Auth::user()->country == "AE" ? "selected":""}}>Émirats arabes unis</option>
                        <option value="EC"{{Auth::user()->country == "EC" ? "selected":""}}>Équateur</option>
                        <option value="ER"{{Auth::user()->country == "ER" ? "selected":""}}>Érythrée</option>
                        <option value="ES"{{Auth::user()->country == "ES" ? "selected":""}}>Espagne</option>
                        <option value="EE"{{Auth::user()->country == "EE" ? "selected":""}}>Estonie</option>
                        <option value="US"{{Auth::user()->country == "US" ? "selected":""}}>États-Unis</option>
                        <option value="ET"{{Auth::user()->country == "ET" ? "selected":""}}>Éthiopie</option>
                        <option value="FJ"{{Auth::user()->country == "FJ" ? "selected":""}}>Fidji</option>
                        <option value="FI"{{Auth::user()->country == "FI" ? "selected":""}}>Finlande</option>
                        <option value="FR"{{Auth::user()->country == "FR" ? "selected":""}}>France</option>
                        <option value="GA"{{Auth::user()->country == "GA" ? "selected":""}}>Gabon</option>
                        <option value="GM"{{Auth::user()->country == "GM" ? "selected":""}}>Gambie</option>
                        <option value="GE"{{Auth::user()->country == "GE" ? "selected":""}}>Géorgie</option>
                        <option value="GH"{{Auth::user()->country == "GH" ? "selected":""}}>Ghana</option>
                        <option value="GR"{{Auth::user()->country == "GR" ? "selected":""}}>Grèce</option>
                        <option value="GD"{{Auth::user()->country == "GD" ? "selected":""}}>Grenade</option>
                        <option value="GT"{{Auth::user()->country == "GT" ? "selected":""}}>Guatemala</option>
                        <option value="GN"{{Auth::user()->country == "GN" ? "selected":""}}>Guinée</option>
                        <option value="GQ"{{Auth::user()->country == "GQ" ? "selected":""}}>Guinée équatoriale</option>
                        <option value="GW"{{Auth::user()->country == "GW" ? "selected":""}}>Guinée-Bissau</option>
                        <option value="GY"{{Auth::user()->country == "GY" ? "selected":""}}>Guyana</option>
                        <option value="GF"{{Auth::user()->country == "GF" ? "selected":""}}>Guyane française</option>
                        <option value="HT"{{Auth::user()->country == "HT" ? "selected":""}}>Haïti</option>
                        <option value="HN"{{Auth::user()->country == "HN" ? "selected":""}}>Honduras</option>
                        <option value="HU"{{Auth::user()->country == "HU" ? "selected":""}}>Hongrie</option>
                        <option value="BV"{{Auth::user()->country == "BV" ? "selected":""}}>Île Bouvet</option>
                        <option value="CX"{{Auth::user()->country == "CX" ? "selected":""}}>Île Christmas</option>
                        <option value="NF"{{Auth::user()->country == "NF" ? "selected":""}}>Île Norfolk</option>
                        <option value="AX"{{Auth::user()->country == "AX" ? "selected":""}}>Îles Åland</option>
                        <option value="KY"{{Auth::user()->country == "KY" ? "selected":""}}>Îles Caïmans</option>
                        <option value="CC"{{Auth::user()->country == "CC" ? "selected":""}}>Îles Cocos - Keeling</option>
                        <option value="CK"{{Auth::user()->country == "CK" ? "selected":""}}>Îles Cook</option>
                        <option value="FO"{{Auth::user()->country == "FO" ? "selected":""}}>Îles Féroé</option>
                        <option value="GS"{{Auth::user()->country == "GS" ? "selected":""}}>Îles Géorgie du Sud et Sandwich du Sud</option>
                        <option value="HM"{{Auth::user()->country == "HM" ? "selected":""}}>Îles Heard-et-MacDonald</option>
                        <option value="FK"{{Auth::user()->country == "FK" ? "selected":""}}>Îles Malouines</option>
                        <option value="MP"{{Auth::user()->country == "MP" ? "selected":""}}>Îles Mariannes du Nord</option>
                        <option value="MH"{{Auth::user()->country == "MH" ? "selected":""}}>Îles Marshall</option>
                        <option value="UM"{{Auth::user()->country == "UM" ? "selected":""}}>Îles mineures éloignées des États-Unis</option>
                        <option value="PN"{{Auth::user()->country == "PN" ? "selected":""}}>Îles Pitcairn</option>
                        <option value="SB"{{Auth::user()->country == "SB" ? "selected":""}}>Îles Salomon</option>
                        <option value="SJ"{{Auth::user()->country == "SJ" ? "selected":""}}>Îles Svalbard et Jan Mayen</option>
                        <option value="TC"{{Auth::user()->country == "TC" ? "selected":""}}>Îles Turks-et-Caïcos</option>
                        <option value="VI"{{Auth::user()->country == "VI" ? "selected":""}}>Îles Vierges américaines</option>
                        <option value="VG"{{Auth::user()->country == "VG" ? "selected":""}}>Îles Vierges britanniques</option>
                        <option value="IN"{{Auth::user()->country == "IN" ? "selected":""}}>Inde</option>
                        <option value="ID"{{Auth::user()->country == "ID" ? "selected":""}}>Indonésie</option>
                        <option value="IR"{{Auth::user()->country == "IR" ? "selected":""}}>Iran</option>
                        <option value="IQ"{{Auth::user()->country == "IQ" ? "selected":""}}>Iraq</option>
                        <option value="IE"{{Auth::user()->country == "IE" ? "selected":""}}>Irlande</option>
                        <option value="IS"{{Auth::user()->country == "IS" ? "selected":""}}>Islande</option>
                        <option value="IL"{{Auth::user()->country == "IL" ? "selected":""}}>Israël</option>
                        <option value="IT"{{Auth::user()->country == "IT" ? "selected":""}}>Italie</option>
                        <option value="JM"{{Auth::user()->country == "JM" ? "selected":""}}>Jamaïque</option>
                        <option value="JP"{{Auth::user()->country == "JP" ? "selected":""}}>Japon</option>
                        <option value="JO"{{Auth::user()->country == "JO" ? "selected":""}}>Jordanie</option>
                        <option value="KZ"{{Auth::user()->country == "KZ" ? "selected":""}}>Kazakhstan</option>
                        <option value="KE"{{Auth::user()->country == "KE" ? "selected":""}}>Kenya</option>
                        <option value="KG"{{Auth::user()->country == "KG" ? "selected":""}}>Kirghizistan</option>
                        <option value="KI"{{Auth::user()->country == "KI" ? "selected":""}}>Kiribati</option>
                        <option value="KW"{{Auth::user()->country == "KW" ? "selected":""}}>Koweït</option>
                        <option value="LA"{{Auth::user()->country == "LA" ? "selected":""}}>Laos</option>
                        <option value="LS"{{Auth::user()->country == "LS" ? "selected":""}}>Lesotho</option>
                        <option value="LV"{{Auth::user()->country == "LV" ? "selected":""}}>Lettonie</option>
                        <option value="LB"{{Auth::user()->country == "LB" ? "selected":""}}>Liban</option>
                        <option value="LR"{{Auth::user()->country == "LR" ? "selected":""}}>Liberia</option>
                        <option value="LY"{{Auth::user()->country == "LY" ? "selected":""}}>Libye</option>
                        <option value="LI"{{Auth::user()->country == "LI" ? "selected":""}}>Liechtenstein</option>
                        <option value="LU"{{Auth::user()->country == "LU" ? "selected":""}}>Luxembourg</option>
                        <option value="MK"{{Auth::user()->country == "MK" ? "selected":""}}>Macédoine</option>
                        <option value="MG"{{Auth::user()->country == "MG" ? "selected":""}}>Madagascar</option>
                        <option value="MY"{{Auth::user()->country == "MY" ? "selected":""}}>Malaisie</option>
                        <option value="MW"{{Auth::user()->country == "MW" ? "selected":""}}>Malawi</option>
                        <option value="MV"{{Auth::user()->country == "MV" ? "selected":""}}>Maldives</option>
                        <option value="ML"{{Auth::user()->country == "ML" ? "selected":""}}>Mali</option>
                        <option value="MT"{{Auth::user()->country == "MT" ? "selected":""}}>Malte</option>
                        <option value="MP"{{Auth::user()->country == "MP" ? "selected":""}}>Mariannes du Nord</option>
                        <option value="MA"{{Auth::user()->country == "MA" ? "selected":""}}>Maroc</option>
                        <option value="MH"{{Auth::user()->country == "MH" ? "selected":""}}>Marshall</option>
                        <option value="MQ"{{Auth::user()->country == "MQ" ? "selected":""}}>Martinique</option>
                        <option value="MU"{{Auth::user()->country == "MU" ? "selected":""}}>Maurice</option>
                        <option value="MR"{{Auth::user()->country == "MR" ? "selected":""}}>Mauritanie</option>
                        <option value="YT"{{Auth::user()->country == "YT" ? "selected":""}}>Mayotte</option>
                        <option value="MX"{{Auth::user()->country == "MX" ? "selected":""}}>Mexique</option>
                        <option value="FM"{{Auth::user()->country == "FM" ? "selected":""}}>Micronésie</option>
                        <option value="MD"{{Auth::user()->country == "MD" ? "selected":""}}>Moldavie</option>
                        <option value="MC"{{Auth::user()->country == "MC" ? "selected":""}}>Monaco</option>
                        <option value="MN"{{Auth::user()->country == "MN" ? "selected":""}}>Mongolie</option>
                        <option value="MS"{{Auth::user()->country == "MS" ? "selected":""}}>Montserrat</option>
                        <option value="MZ"{{Auth::user()->country == "MZ" ? "selected":""}}>Mozambique</option>
                        <option value="NA"{{Auth::user()->country == "NA" ? "selected":""}}>Namibie</option>
                        <option value="NR"{{Auth::user()->country == "NR" ? "selected":""}}>Nauru</option>
                        <option value="NP"{{Auth::user()->country == "NP" ? "selected":""}}>Népal</option>
                        <option value="NI"{{Auth::user()->country == "NI" ? "selected":""}}>Nicaragua</option>
                        <option value="NE"{{Auth::user()->country == "NE" ? "selected":""}}>Niger</option>
                        <option value="NG"{{Auth::user()->country == "NG" ? "selected":""}}>Nigeria</option>
                        <option value="NU"{{Auth::user()->country == "NU" ? "selected":""}}>Niue</option>
                        <option value="NO"{{Auth::user()->country == "NO" ? "selected":""}}>Norvège</option>
                        <option value="NC"{{Auth::user()->country == "NC" ? "selected":""}}>Nouvelle-Calédonie</option>
                        <option value="NZ"{{Auth::user()->country == "NZ" ? "selected":""}}>Nouvelle-Zélande</option>
                        <option value="OM"{{Auth::user()->country == "OM" ? "selected":""}}>Oman</option>
                        <option value="UG"{{Auth::user()->country == "UG" ? "selected":""}}>Ouganda</option>
                        <option value="UZ"{{Auth::user()->country == "UZ" ? "selected":""}}>Ouzbékistan</option>
                        <option value="PK"{{Auth::user()->country == "PK" ? "selected":""}}>Pakistan</option>
                        <option value="PW"{{Auth::user()->country == "PW" ? "selected":""}}>Palaos</option>
                        <option value="PA"{{Auth::user()->country == "PA" ? "selected":""}}>Panama</option>
                        <option value="PG"{{Auth::user()->country == "PG" ? "selected":""}}>Papouasie-Nouvelle-Guinée</option>
                        <option value="PY"{{Auth::user()->country == "PY" ? "selected":""}}>Paraguay</option>
                        <option value="NL"{{Auth::user()->country == "NL" ? "selected":""}}>Pays-Bas</option>
                        <option value="PE"{{Auth::user()->country == "PE" ? "selected":""}}>Pérou</option>
                        <option value="PH"{{Auth::user()->country == "PH" ? "selected":""}}>Philippines</option>
                        <option value="PN"{{Auth::user()->country == "PN" ? "selected":""}}>Pitcairn</option>
                        <option value="PL"{{Auth::user()->country == "PL" ? "selected":""}}>Pologne</option>
                        <option value="PF"{{Auth::user()->country == "PF" ? "selected":""}}>Polynésie française</option>
                        <option value="PR"{{Auth::user()->country == "PR" ? "selected":""}}>Porto Rico</option>
                        <option value="PT"{{Auth::user()->country == "PT" ? "selected":""}}>Portugal</option>
                        <option value="QA"{{Auth::user()->country == "QA" ? "selected":""}}>Qatar</option>
                        <option value="SY"{{Auth::user()->country == "SY" ? "selected":""}}>République arabe syrienne</option>
                        <option value="CF"{{Auth::user()->country == "CF" ? "selected":""}}>République centrafricaine</option>
                        <option value="CZ"{{Auth::user()->country == "CZ" ? "selected":""}}>République tchèque</option>
                        <option value="DO"{{Auth::user()->country == "DO" ? "selected":""}}>République dominicaine</option>
                        <option value="RE"{{Auth::user()->country == "RE" ? "selected":""}}>Réunion</option>
                        <option value="RO"{{Auth::user()->country == "RO" ? "selected":""}}>Roumanie</option>
                        <option value="GB"{{Auth::user()->country == "GB" ? "selected":""}}>Royaume-Uni</option>
                        <option value="RU"{{Auth::user()->country == "RU" ? "selected":""}}>Russie</option>
                        <option value="RW"{{Auth::user()->country == "RW" ? "selected":""}}>Rwanda</option>
                        <option value="EH"{{Auth::user()->country == "EH" ? "selected":""}}>Sahara occidental</option>
                        <option value="BL"{{Auth::user()->country == "BL" ? "selected":""}}>Saint-Barthélemy</option>
                        <option value="SH"{{Auth::user()->country == "SH" ? "selected":""}}>Sainte-Hélène</option>
                        <option value="LC"{{Auth::user()->country == "LC" ? "selected":""}}>Sainte-Lucie</option>
                        <option value="KN"{{Auth::user()->country == "KN" ? "selected":""}}>Saint-Kitts-et-Nevis</option>
                        <option value="SM"{{Auth::user()->country == "SM" ? "selected":""}}>Saint-Marin</option>
                        <option value="MF"{{Auth::user()->country == "MF" ? "selected":""}}>Saint-Martin</option>
                        <option value="PM"{{Auth::user()->country == "PM" ? "selected":""}}>Saint-Pierre-et-Miquelon</option>
                        <option value="VC"{{Auth::user()->country == "VC" ? "selected":""}}>Saint-Vincent-et-les-Grenadines</option>
                        <option value="WS"{{Auth::user()->country == "WS" ? "selected":""}}>Samoa</option>
                        <option value="AS"{{Auth::user()->country == "AS" ? "selected":""}}>Samoa américaines</option>
                        <option value="ST"{{Auth::user()->country == "ST" ? "selected":""}}>Sao Tomé-et-Principe</option>
                        <option value="SN"{{Auth::user()->country == "SN" ? "selected":""}}>Sénégal</option>
                        <option value="RS"{{Auth::user()->country == "RS" ? "selected":""}}>Serbie</option>
                        <option value="SC"{{Auth::user()->country == "SC" ? "selected":""}}>Seychelles</option>
                        <option value="SL"{{Auth::user()->country == "SL" ? "selected":""}}>Sierra Leone</option>
                        <option value="SG"{{Auth::user()->country == "SG" ? "selected":""}}>Singapour</option>
                        <option value="SK"{{Auth::user()->country == "SK" ? "selected":""}}>Slovaquie</option>
                        <option value="SI"{{Auth::user()->country == "SI" ? "selected":""}}>Slovénie</option>
                        <option value="SO"{{Auth::user()->country == "SO" ? "selected":""}}>Somalie</option>
                        <option value="SD"{{Auth::user()->country == "SD" ? "selected":""}}>Soudan</option>
                        <option value="LK"{{Auth::user()->country == "LK" ? "selected":""}}>Sri Lanka</option>
                        <option value="SE"{{Auth::user()->country == "SE" ? "selected":""}}>Suède</option>
                        <option value="CH"{{Auth::user()->country == "CH" ? "selected":""}}>Suisse</option>
                        <option value="SR"{{Auth::user()->country == "SR" ? "selected":""}}>Suriname</option>
                        <option value="SJ"{{Auth::user()->country == "SJ" ? "selected":""}}>Svalbard et Jan Mayen</option>
                        <option value="SZ"{{Auth::user()->country == "SZ" ? "selected":""}}>Swaziland</option>
                        <option value="TJ"{{Auth::user()->country == "TJ" ? "selected":""}}>Tadjikistan</option>
                        <option value="TW"{{Auth::user()->country == "TW" ? "selected":""}}>Taïwan</option>
                        <option value="TZ"{{Auth::user()->country == "TZ" ? "selected":""}}>Tanzanie</option>
                        <option value="TD"{{Auth::user()->country == "TD" ? "selected":""}}>Tchad</option>
                        <option value="TF"{{Auth::user()->country == "TF" ? "selected":""}}>Terres australes françaises</option>
                        <option value="IO"{{Auth::user()->country == "IO" ? "selected":""}}>Territoire britannique de l'océan Indien</option>
                        <option value="PS"{{Auth::user()->country == "PS" ? "selected":""}}>Territoires palestiniens</option>
                        <option value="TH"{{Auth::user()->country == "TH" ? "selected":""}}>Thaïlande</option>
                        <option value="TL"{{Auth::user()->country == "TL" ? "selected":""}}>Timor oriental</option>
                        <option value="TG"{{Auth::user()->country == "TG" ? "selected":""}}>Togo</option>
                        <option value="TK"{{Auth::user()->country == "TK" ? "selected":""}}>Tokelau</option>
                        <option value="TO"{{Auth::user()->country == "TO" ? "selected":""}}>Tonga</option>
                        <option value="TT"{{Auth::user()->country == "TT" ? "selected":""}}>Trinité-et-Tobago</option>
                        <option value="TN"{{Auth::user()->country == "TN" ? "selected":""}}>Tunisie</option>
                        <option value="TM"{{Auth::user()->country == "TM" ? "selected":""}}>Turkménistan</option>
                        <option value="TC"{{Auth::user()->country == "TC" ? "selected":""}}>Turks-et-Caïcos</option>
                        <option value="TR"{{Auth::user()->country == "TR" ? "selected":""}}>Turquie</option>
                        <option value="TV"{{Auth::user()->country == "TV" ? "selected":""}}>Tuvalu</option>
                        <option value="UA"{{Auth::user()->country == "UA" ? "selected":""}}>Ukraine</option>
                        <option value="UY"{{Auth::user()->country == "UY" ? "selected":""}}>Uruguay</option>
                        <option value="VU"{{Auth::user()->country == "VU" ? "selected":""}}>Vanuatu</option>
                        <option value="VE"{{Auth::user()->country == "VE" ? "selected":""}}>Venezuela</option>
                        <option value="VN"{{Auth::user()->country == "VN" ? "selected":""}}>Viêt Nam</option>
                        <option value="WF"{{Auth::user()->country == "WF" ? "selected":""}}>Wallis-et-Futuna</option>
                        <option value="YE"{{Auth::user()->country == "YE" ? "selected":""}}>Yémen</option>
                        <option value="ZM"{{Auth::user()->country == "ZM" ? "selected":""}}>Zambie</option>
                        <option value="ZW"{{Auth::user()->country == "ZW" ? "selected":""}}>Zimbabwe</option>
                      </select>
                      <div class="invalid-feedback">Veuillez saisir votre pays</div>
                    </div>
                    <div class="col-sm-6 mb-4">
                      <label for="state" class="form-label fs-base">Région</label>
                      <input type="text" name="region" id="state" class="form-control form-control-lg" value="{{Auth::user()->region}}" required>
                      <div class="invalid-feedback">Please choose your state!</div>
                    </div>
                    <div class="col-sm-6 mb-4">
                      <label for="city" class="form-label fs-base">Ville</label>
                      <input type="text" name="city" id="city" class="form-control form-control-lg" value="{{Auth::user()->city}}" required>
                      <div class="invalid-feedback">Saisir votre ville</div>
                    </div>
                    <div class="col-sm-6 mb-4">
                      <label for="zip" class="form-label fs-base">Code postal</label>
                      <input type="text" name="postal_code" id="zip" class="form-control form-control-lg" value="{{Auth::user()->postal_code}}" required>
                      <div class="invalid-feedback">Please enter your ZIP code!</div>
                    </div>
                    <div class="col-12 mb-4">
                      <label for="address1" class="form-label fs-base">Adresse</label>
                      <input id="address1" name="address" class="form-control form-control-lg" type="text" value="{{Auth::user()->address}}" required>
                    </div>
                  </div>
                  <div class="d-flex mb-3">
                    <button type="reset" class="btn btn-secondary me-3">Annuler</button>
                    <button type="submit" class="btn btn-secondary">Sauvegarder</button>
                  </div>
              </form>

              <!-- Delete account -->
              <form method="POST" action="{{ route('delete_account') }}">
              <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                @csrf
                @method('POST')
              <h2 class="h5 pt-1 pt-lg-3 mt-4">Effacer le compte</h2>
              <p class="fs-sm pb-2">Vous pouvez supprimer votre compte à tout moment.</p>
              <p class="fs-sm pb-2"> Pendant 30 jours, si vous regrettez vous pourrez revenir et retrouver vos données intactes. </p>
              <div class="form-check mb-4">
                <input type="checkbox" id="delete-account" class="form-check-input" required>
                <label for="delete-account" class="form-check-label fs-base">Oui, je veux supprimer mon compte</label>
              </div>
              <button type="submit" class="btn btn-danger">Effacer</button>
              </form>
            </div>
          </div>
        </div>
      </section>
    </main>
    @include('template.rrweb')
@endsection