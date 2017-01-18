/* News content slides down from the click of the headline. Utilising jQuery's slideToggle()

    1. Initiates function when the document has loaded
    2. Calls function on click of class ".news-headline"
    3. Specifies class with "this" keyword 
    4. next() method specifies next sibling (the news content relating to click)
    5. slideToggle() method attached to class ".news-content"

*/

$(document).ready(function(){
    
    $(".news-headline").click(function(){
        $(this).next(".news-content").slideToggle();
    });
});


/* Setting {display: none} on the fly caused a glitch - initial load of style.css displays content briefly before jQuery function sets it to none. REMOVED.

    $(".news-content").css("display", "none");

*/