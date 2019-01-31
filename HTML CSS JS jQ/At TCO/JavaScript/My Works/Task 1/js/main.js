var name = prompt('Գրիր քո անուն:');
alert('Բարև հարգելի' + ' ' + name + ':\n' + 'Արի փոձենք խաղալ մեկ հատ խաղ:');
alert('Հիմա կխնդրեմ հետևել իմ պայմաններին:');

var naxnakanTivStringType = prompt('Գրիր մեկ հատ հնգանիշ թիվ: ');
var naxnakanTiv = parseInt(naxnakanTivStringType);
var gumarvoxTiv = naxnakanTiv / 10000;
var koxqiMnacord = gumarvoxTiv % 1;
gumarvoxTiv -= koxqiMnacord;
var verjanakanTiv = naxnakanTiv + gumarvoxTiv;
var adminArajinTiv = verjanakanTiv - 10000 * gumarvoxTiv;
var adminTveriQanak = gumarvoxTiv + 1;



if (naxnakanTiv > 100000 || naxnakanTiv < 10000)
  alert('Ասեցի էլ որ պետք է հնգանիշ լինի: Դե հիմա գնա նորից սկսիր: Ուշադիր կլինես:');
else if (naxnakanTiv > 60000 && naxnakanTiv < 100000) {
  alert('Minchev 60000-i depqn em grel,meka pit copy-paste anei u mi qani baner avelacenei/poxei...logikan nuynna...nenc vor aveli lav klini 60000-ic poqr tiv gres vor xaxy xaxas :D :D ...u 20000-ic mec gri vor hetaqrqir lini hargeli ' + name + ' jan...\nHarganqnerov ` Arthur Margarian.');
} else
  alert('Դու մուտքագրել ես ' + naxnakanTiv + ' թիվը:\nՀիշիր այս թիվը, ամենավերջում այն մեզ պետք կգա:');

//&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& TasHazaric - QsanHazar &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&

if (naxnakanTiv >= 10000 && naxnakanTiv < 20000) {

  alert('Հիմա ես և դու հերթականությամբ կգրենք պատահական քառանիշ թվեր, ես ' + adminTveriQanak + ' անգամ իսկ դու ' + gumarvoxTiv + ' անգամ:');

  // &&&&&&&&&&&&&&&&& arajin tiv &&&&&&&&&&&&&&&&&
  var userArajinTivTypeString = prompt('Իմ առաջին թիվը ' + adminArajinTiv + '-ն է:\nԳրիր քո առաջին թիվը: Հիշեցնեմ որ թիվը պետք է լինի քառանիշ:');
  var userArajinTiv = parseInt(userArajinTivTypeString);
  var adminErkrordTiv = 9999 - userArajinTiv;

  if (userArajinTiv >= 10000 || userArajinTiv <= 999)
    alert('Ասեցի էլ որ պետք է քառանիշ լինի: Դե հիմա գնա նորից սկսիր: Ուշադիր կլինես:');
  else {

    // &&&&&&&&&&&&&&&&& erkrord tiv &&&&&&&&&&&&&&&&&
    alert('Իմ առաջին թիվն էր ' + adminArajinTiv + '-ը:\nիսկ քո առաջին թիվը ' + userArajinTiv + '-ն էր:\nԻմ երկրորդ թիվն է ' + adminErkrordTiv + '-ը:' + '\nՀիմա մեր գրած պատահական թվերը կգւմարենք իրար և կստանանք մի հետաքրքիր թիվ:');

    // &&&&&&&&&&&&&&&&& result &&&&&&&&&&&&&&&&&
    alert("Ուրեմն այսպես: \n" + adminArajinTiv + " + " + userArajinTiv + " + " + adminErkrordTiv + " = " + naxnakanTiv + "\nՍտացաց գումարը սկզբում գրած քո հնգանիշ թիվն է:\nFocus with computer :D ");
  }
}
//&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& QsanHazaric - EresunHazar &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&

if (naxnakanTiv >= 20000 && naxnakanTiv < 30000) {

  alert('Հիմա ես և դու հերթականությամբ կգրենք պատահական քառանիշ թվեր, ես ' + adminTveriQanak + ' անգամ իսկ դու ' + gumarvoxTiv + ' անգամ:');

  // &&&&&&&&&&&&&&&&& arajin tiv &&&&&&&&&&&&&&&&&
  var userArajinTivTypeString = prompt('Իմ առաջին թիվը ' + adminArajinTiv + '-ն է:\nԳրիր քո առաջին թիվը: Հիշեցնեմ որ թիվը պետք է լինի քառանիշ:');
  var userArajinTiv = parseInt(userArajinTivTypeString);
  var adminErkrordTiv = 9999 - userArajinTiv;

  if (userArajinTiv >= 10000 || userArajinTiv <= 999)
    alert('Ասեցի էլ որ պետք է քառանիշ լինի: Դե հիմա գնա նորից սկսիր: Ուշադիր կլինես:');
  else {

    // &&&&&&&&&&&&&&&&& erkrord tiv &&&&&&&&&&&&&&&&&
    var userErkrordTivTypeString = prompt('Իմ 1-ին թիվը: ' + adminArajinTiv + '\nՔո 1-ին թիվը: ' + userArajinTiv + '\n\n\nԻմ 2-րդ թիվը: ' + adminErkrordTiv + '\n\nԳրիր քո 2-րդ թիվը:');
    var userErkrordTiv = parseInt(userErkrordTivTypeString);
    if (userErkrordTiv >= 10000 || userErkrordTiv <= 999)
      alert('Ասեցի էլ որ պետք է քառանիշ լինի: Դե հիմա գնա նորից սկսիր: Ուշադիր կլինես:');
    else {
      // &&&&&&&&&&&&&&&&& errord tiv &&&&&&&&&&&&&&&&&
      var adminErrordTiv = 9999 - userErkrordTiv;
      alert('Իմ 1-ին թիվը: ' + adminArajinTiv + '\nՔո 1-ին թիվը: ' + userArajinTiv + '\nԻմ 2-րդ թիվը: ' + adminErkrordTiv + '\nՔո 2-րդ թիվը: ' + userErkrordTiv + '\n\nԻմ 3-րդ թիվը: ' + adminErrordTiv);

      // &&&&&&&&&&&&&&&&& result &&&&&&&&&&&&&&&&&
      alert('Հիմա մեր գրած պատահական թվերը կգումարենք իրար և կստանանք մի հետաքրքիր թիվ:');
      alert("Ուրեմն այսպես: \n" + adminArajinTiv + " + " + userArajinTiv + " + " + adminErkrordTiv + ' + ' + userErkrordTiv + ' + ' + adminErrordTiv + ' = ' + naxnakanTiv + "\nՍտացված գումարը սկզբում գրած քո հնգանիշ թիվն է:\n\n\nFocus with computer :D ");
    }
  }
}

// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& EresunHazaric - QarasunHazar &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&

if (naxnakanTiv >= 30000 && naxnakanTiv < 40000) {

  alert('Հիմա ես և դու հերթականությամբ կգրենք պատահական քառանիշ թվեր, ես ' + adminTveriQanak + ' անգամ իսկ դու ' + gumarvoxTiv + ' անգամ:');

  // &&&&&&&&&&&&&&&&& arajin tiv &&&&&&&&&&&&&&&&&
  var userArajinTivTypeString = prompt('Իմ առաջին թիվը ' + adminArajinTiv + '-ն է:\nԳրիր քո առաջին թիվը: Հիշեցնեմ որ թիվը պետք է լինի քառանիշ:');
  var userArajinTiv = parseInt(userArajinTivTypeString);

  if (userArajinTiv >= 10000 || userArajinTiv <= 999)
    alert('Ասեցի էլ որ պետք է քառանիշ լինի: Դե հիմա գնա նորից սկսիր: Ուշադիր կլինես:');
  else {

    // &&&&&&&&&&&&&&&&& erkrord tiv &&&&&&&&&&&&&&&&&
    var adminErkrordTiv = 9999 - userArajinTiv;
    var userErkrordTivTypeString = prompt('Իմ 1-ին թիվը: ' + adminArajinTiv + '\nՔո 1-ին թիվը: ' + userArajinTiv + '\n\nԻմ 2-րդ թիվը: ' + adminErkrordTiv + '\n\n\nԳրիր քո 2-րդ թիվը:');
    var userErkrordTiv = parseInt(userErkrordTivTypeString);
    if (userErkrordTiv >= 10000 || userErkrordTiv <= 999)
      alert('Ասեցի էլ որ պետք է քառանիշ լինի: Դե հիմա գնա նորից սկսիր: Ուշադիր կլինես:');
    else {

      // &&&&&&&&&&&&&&&&& errord tiv &&&&&&&&&&&&&&&&&
      var adminErrordTiv = 9999 - userErkrordTiv;
      var userErrordTivTypeString = prompt('Իմ 1-ին թիվը: ' + adminArajinTiv + '\nՔո 1-ին թիվը: ' + userArajinTiv + '\nԻմ 2-րդ թիվը: ' + adminErkrordTiv + '\nՔո 2-րդ թիվը: ' + userErkrordTiv + '\n\nԻմ 3-րդ թիվը: ' + adminErrordTiv + '\n\n\nԳրիր քո 3-րդ թիվը:');
      var userErrordTiv = parseInt(userErrordTivTypeString);
      if (userErrordTiv >= 10000 || userErrordTiv <= 999)
        alert('Ասեցի էլ որ պետք է քառանիշ լինի: Դե հիմա գնա նորից սկսիր: Ուշադիր կլինես:');
      else {

        // &&&&&&&&&&&&&&&&& chorord tiv &&&&&&&&&&&&&&&&&
        var adminChorordTiv = 9999 - userErrordTiv;
        alert('Իմ 1-ին թիվը: ' + adminArajinTiv + '\nՔո 1-ին թիվը: ' + userArajinTiv + '\nԻմ 2-րդ թիվը: ' + adminErkrordTiv + '\nՔո 2-րդ թիվը: ' + userErkrordTiv + '\nԻմ 3-րդ թիվը: ' + adminErrordTiv + '\n\nՔո 3-րդ թիվը: ' + adminErrordTiv + '\n\n\nԻմ 4-րդ թիվը: ' + adminChorordTiv);

        // &&&&&&&&&&&&&&&&& result &&&&&&&&&&&&&&&&&
        alert('Հիմա մեր գրած պատահական թվերը կգումարենք իրար և կստանանք մի հետաքրքիր թիվ:');
        alert("Ուրեմն այսպես: \n" + adminArajinTiv + " + " + userArajinTiv + " + " + adminErkrordTiv + ' + ' + userErkrordTiv + ' + ' + adminErrordTiv + ' + ' + userErrordTiv + ' + ' +
          adminChorordTiv + ' = ' + naxnakanTiv + "\nՍտացված գումարը սկզբում գրած քո հնգանիշ թիվն է:\n\nFocus with computer :D ");
      }
    }
  }
}

// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& QarasunHazaric HisunHazar &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&

if (naxnakanTiv >= 40000 && naxnakanTiv < 50000) {

  alert('Հիմա ես և դու հերթականությամբ կգրենք պատահական քառանիշ թվեր, ես ' + adminTveriQanak + ' անգամ իսկ դու ' + gumarvoxTiv + ' անգամ:');

  // &&&&&&&&&&&&&&&&& arajin tiv &&&&&&&&&&&&&&&&&
  var userArajinTivTypeString = prompt('Իմ առաջին թիվը ' + adminArajinTiv + '-ն է:\nԳրիր քո առաջին թիվը: Հիշեցնեմ որ թիվը պետք է լինի քառանիշ:');
  var userArajinTiv = parseInt(userArajinTivTypeString);

  if (userArajinTiv >= 10000 || userArajinTiv <= 999)
    alert('Ասեցի էլ որ պետք է քառանիշ լինի: Դե հիմա գնա նորից սկսիր: Ուշադիր կլինես:');
  else {

    // &&&&&&&&&&&&&&&&& erkrord tiv &&&&&&&&&&&&&&&&&
    var adminErkrordTiv = 9999 - userArajinTiv;
    var userErkrordTivTypeString = prompt('Իմ 1-ին թիվը: ' + adminArajinTiv + '\nՔո 1-ին թիվը: ' + userArajinTiv + '\n\nԻմ 2-րդ թիվը: ' + adminErkrordTiv + '\n\n\nԳրիր քո 2-րդ թիվը:');
    var userErkrordTiv = parseInt(userErkrordTivTypeString);
    if (userErkrordTiv > 10000 || userErkrordTiv < 1000)
      alert('Ասեցի էլ որ պետք է քառանիշ լինի: Դե հիմա գնա նորից սկսիր: Ուշադիր կլինես:');
    else {

      // &&&&&&&&&&&&&&&&& errord tiv &&&&&&&&&&&&&&&&&
      var adminErrordTiv = 9999 - userErkrordTiv;
      var userErrordTivTypeString = prompt('Իմ 1-ին թիվը: ' + adminArajinTiv + '\nՔո 1-ին թիվը: ' + userArajinTiv + '\nԻմ 2-րդ թիվը: ' + adminErkrordTiv + '\nՔո 2-րդ թիվը: ' + userErkrordTiv + '\n\nԻմ 3-րդ թիվը: ' + adminErrordTiv + '\n\n\nԳրիր քո 3-րդ թիվը:');
      var userErrordTiv = parseInt(userErrordTivTypeString);
      if (userErrordTiv > 10000 || userErrordTiv < 1000)
        alert('Ասեցի էլ որ պետք է քառանիշ լինի: Դե հիմա գնա նորից սկսիր: Ուշադիր կլինես:');
      else {

        // &&&&&&&&&&&&&&&&& chorord tiv &&&&&&&&&&&&&&&&&
        var adminChorordTiv = 9999 - userErrordTiv;
        var userChorordTivTypeString = prompt('Իմ 1-ին թիվը: ' + adminArajinTiv + '\nՔո 1-ին թիվը: ' + userArajinTiv + '\nԻմ 2-րդ թիվը: ' + adminErkrordTiv + '\nՔո 2-րդ թիվը: ' + userErkrordTiv + '\nԻմ 3-րդ թիվը: ' + adminErrordTiv + '\nՔո 3-րդ թիվը: ' + userErrordTiv + '\n\nԻմ 4-րդ թիվը: ' + adminChorordTiv + '\n\n\nԳրիր քո 4-րդ թիվը:');
        var userChorordTiv = parseInt(userChorordTivTypeString);
        if (userChorordTiv > 10000 || userChorordTiv < 1000)
          alert('Ասեցի էլ որ պետք է քառանիշ լինի: Դե հիմա գնա նորից սկսիր: Ուշադիր կլինես:');
        else {

          // &&&&&&&&&&&&&&&&& hingerord tiv &&&&&&&&&&&&&&&&&
          var adminHingerordTiv = 9999 - userChorordTiv;
          alert('Իմ 1-ին թիվը: ' + adminArajinTiv + '\nՔո 1-ին թիվը: ' + userArajinTiv + '\nԻմ 2-րդ թիվը: ' + adminErkrordTiv + '\nՔո 2-րդ թիվը: ' + userErkrordTiv + '\nԻմ 3-րդ թիվը: ' + adminErrordTiv + '\nՔո 3-րդ թիվը: ' + adminErrordTiv + '\nԻմ 4-րդ թիվը: ' + adminChorordTiv + '\nՔո 4-րդ թիվը: ' + userChorordTiv + '\n\nԻմ 5-րդ թիվը: ' + adminHingerordTiv);

          // &&&&&&&&&&&&&&&&& result &&&&&&&&&&&&&&&&&
          alert('Հիմա մեր գրած պատահական թվերը կգումարենք իրար և կստանանք մի հետաքրքիր թիվ:');
          alert("Ուրեմն այսպես: \n" + adminArajinTiv + " + " + userArajinTiv + " + " + adminErkrordTiv + ' + ' + userErkrordTiv + ' + ' + adminErrordTiv + ' + ' + userErrordTiv + ' + ' +
            adminChorordTiv + ' + ' + userChorordTiv + ' + ' + adminHingerordTiv + ' = ' + naxnakanTiv + "\nՍտացված գումարը սկզբում գրած քո հնգանիշ թիվն է:\n\nFocus with computer :D ");
        }
      }
    }
  }
}

//&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& HisunHazaric - VacunHazar &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&

if (naxnakanTiv >= 50000 && naxnakanTiv < 60000) {

  alert('Հիմա ես և դու հերթականությամբ կգրենք պատահական քառանիշ թվեր, ես ' + adminTveriQanak + ' անգամ իսկ դու ' + gumarvoxTiv + ' անգամ:');

  // &&&&&&&&&&&&&&&&& arajin tiv &&&&&&&&&&&&&&&&&
  var userArajinTivTypeString = prompt('Իմ առաջին թիվը ' + adminArajinTiv + '-ն է:\nԳրիր քո առաջին թիվը: Հիշեցնեմ որ թիվը պետք է լինի քառանիշ:');
  var userArajinTiv = parseInt(userArajinTivTypeString);

  if (userArajinTiv >= 10000 || userArajinTiv <= 999)
    alert('Ասեցի էլ որ պետք է քառանիշ լինի: Դե հիմա գնա նորից սկսիր: Ուշադիր կլինես:');
  else {

    // &&&&&&&&&&&&&&&&& erkrord tiv &&&&&&&&&&&&&&&&&
    var adminErkrordTiv = 9999 - userArajinTiv;
    var userErkrordTivTypeString = prompt('Իմ 1-ին թիվը: ' + adminArajinTiv + '\nՔո 1-ին թիվը: ' + userArajinTiv + '\n\nԻմ 2-րդ թիվը: ' + adminErkrordTiv + '\n\n\nԳրիր քո 2-րդ թիվը:');
    var userErkrordTiv = parseInt(userErkrordTivTypeString);
    if (userErkrordTiv > 10000 || userErkrordTiv < 1000)
      alert('Ասեցի էլ որ պետք է քառանիշ լինի: Դե հիմա գնա նորից սկսիր: Ուշադիր կլինես:');
    else {

      // &&&&&&&&&&&&&&&&& errord tiv &&&&&&&&&&&&&&&&&
      var adminErrordTiv = 9999 - userErkrordTiv;
      var userErrordTivTypeString = prompt('Իմ 1-ին թիվը: ' + adminArajinTiv + '\nՔո 1-ին թիվը: ' + userArajinTiv + '\nԻմ 2-րդ թիվը: ' + adminErkrordTiv + '\nՔո 2-րդ թիվը: ' + userErkrordTiv + '\n\nԻմ 3-րդ թիվը: ' + adminErrordTiv + '\n\n\nԳրիր քո 3-րդ թիվը:');
      var userErrordTiv = parseInt(userErrordTivTypeString);
      if (userErrodTiv > 10000 || userErrodTiv < 1000)
        alert('Ասեցի էլ որ պետք է քառանիշ լինի: Դե հիմա գնա նորից սկսիր: Ուշադիր կլինես:');
      else {
        // &&&&&&&&&&&&&&&&& chorord tiv &&&&&&&&&&&&&&&&&
        var adminChorordTiv = 9999 - userErrordTiv;
        var userChorordTivTypeString = prompt('Իմ 1-ին թիվը: ' + adminArajinTiv + '\nՔո 1-ին թիվը: ' + userArajinTiv + '\nԻմ 2-րդ թիվը: ' + adminErkrordTiv + '\nՔո 2-րդ թիվը: ' + userErkrordTiv + '\nԻմ 3-րդ թիվը: ' + adminErrordTiv + '\nՔո 3-րդ թիվը: ' + userErrordTiv + '\n\nԻմ 4-րդ թիվը: ' + adminChorordTiv + '\n\n\nԳրիր քո 4-րդ թիվը:');
        var userChorordTiv = parseInt(userChorordTivTypeString);

        if (userChorordTiv > 10000 || userChorordTiv < 1000)
          alert('Ասեցի էլ որ պետք է քառանիշ լինի: Դե հիմա գնա նորից սկսիր: Ուշադիր կլինես:');
        else {

          // &&&&&&&&&&&&&&&&& hingerord tiv &&&&&&&&&&&&&&&&&
          var adminHingerordTiv = 9999 - userChorordTiv;
          var userHingerordTivTypeString = prompt('Իմ 1-ին թիվը: ' + adminArajinTiv + '\nՔո 1-ին թիվը: ' + userArajinTiv + '\nԻմ 2-րդ թիվը: ' + adminErkrordTiv + '\nՔո 2-րդ թիվը: ' + userErkrordTiv + '\nԻմ 3-րդ թիվը: ' + adminErrordTiv + '\nՔո 3-րդ թիվը: ' + userErrordTiv + '\nԻմ 4-րդ թիվը: ' + adminChorordTiv + '\nՔո 4-րդ թիվը: ' + userChorordTiv + '\n\nԻմ 5-րդ թիվը: ' + adminHingerordTiv + '\n\n\nԳրիր քո 5-րդ թիվը:');
          var userHingerordTiv = parseInt(userHingerordTivTypeString);
          if (userHingerordTiv > 10000 || userHingerordTiv < 1000)
            alert('Ասեցի էլ որ պետք է քառանիշ լինի: Դե հիմա գնա նորից սկսիր: Ուշադիր կլինես:');
          else {
            // &&&&&&&&&&&&&&&&& vecerord tiv &&&&&&&&&&&&&&&&&
            var adminVecerordTiv = 9999 - userHingerordTiv;
            alert('Իմ 1-ին թիվը: ' + adminArajinTiv + '\nՔո 1-ին թիվը: ' + userArajinTiv + '\nԻմ 2-րդ թիվը: ' + adminErkrordTiv + '\nՔո 2-րդ թիվը: ' + userErkrordTiv + '\nԻմ 3-րդ թիվը: ' + adminErrordTiv + '\nՔո 3-րդ թիվը: ' + adminErrordTiv + '\nԻմ 4-րդ թիվը: ' + adminChorordTiv + '\nՔո 4-րդ թիվը: ' + userChorordTiv + '\nԻմ 5-րդ թիվը: ' + adminHingerordTiv + '\n\nՔո 5-րդ թիվը: ' + userHingerordTiv + '\n\n\nԻմ 6-րդ թիվը: ' + adminVecerordTiv);

            // &&&&&&&&&&&&&&&&& result &&&&&&&&&&&&&&&&&
            alert('Հիմա մեր գրած պատահական թվերը կգումարենք իրար և կստանանք մի հետաքրքիր թիվ:');
            alert("Ուրեմն այսպես: \n" + adminArajinTiv + " + " + userArajinTiv + " + " + adminErkrordTiv + ' + ' + userErkrordTiv + ' + ' + adminErrordTiv + ' + ' + userErrordTiv + ' + ' +
              adminChorordTiv + ' + ' + userChorordTiv + ' + ' + adminHingerordTiv + ' + ' + userHingerordTiv + ' + ' + adminVecerordTiv + ' = ' + naxnakanTiv + "\nՍտացված գումարը սկզբում գրած քո հնգանիշ թիվն է:\n\nFocus with computer :D ");
          }
        }
      }
    }
  }
}