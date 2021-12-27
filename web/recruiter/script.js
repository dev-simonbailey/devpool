function setState(lang){
    //console.log(lang);
    let langSel = document.getElementById(lang);
    //console.log(langSel.checked);
    let langExp = document.getElementById(lang + "-exp");
    if(langSel.checked == true){
        //console.log("Checked");
        langExp.disabled = false;
        return;
    }
    langExp.disabled = true;
    langExp.selectedIndex = "0"
}