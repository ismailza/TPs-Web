function msg_view(in_id, sel)
{
    if (document.getElementById(in_id).value == "")
    {
        document.getElementById(sel).innerHTML = "* Champ obligatoire";
        return 1;
    }
    document.getElementById(sel).innerHTML = "";
    return 0;
}
function Verify_grade(in_id, sel)
{
    let n = document.getElementById(in_id).value;
    if (n == "")
    {
        document.getElementById(sel).innerHTML = "* Champ obligatoire";
        return 1;
    }
    else if ((n < 0) || (n > 20)) 
    {
        document.getElementById(sel).innerHTML = "* Note doit être entre 0 et 20";
        return 1;
    }
    document.getElementById(sel).innerHTML = "";
    return 0;
}
function Verify_input()
{
    let t = 0;    
    t += msg_view("nom", "nom_msg");
    t += msg_view("filiere", "filiere_msg");
    t += Verify_grade("controle", "controle_msg");
    t += Verify_grade("exam", "exam_msg");
    if (!t) return true;
    return false;
}