SELECT summary,title 
FROM film
WHERE summary
LIKE "%Vincent%"
ORDER BY id_film ASC;