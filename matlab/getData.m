function [Y,R,movieList] = getData()
     bbdd='ai57';
     user='root';
     pass='1234';
    
     % Connect with the database
     conn = database(bbdd,user,pass);
     
     % If conn.Message is empty: no error, we have connected
     if (isempty(conn.Message)) 
         
         %  We have to get the following matrices:
         %  Y is a matrix num_films x num_users, which contains ratings
         %  1-5 of num_films from num_users
         %  R es is a matrix num_films x num_users, where R(i,j) = 1 
         %  if user j has given a score to film i
         
         %  We initialize the matrices to the correct dimensions
         
         %  We get the number of films first:
         get_films = exec(conn,'SELECT COUNT(id) as num_films FROM movie');
         films = fetch(get_films);
         close(get_films);
          
         %  It is stored in our variable num_films
         num_films = films.Data;
         
         %  Now we get the number of users
         get_users = exec(conn,'SELECT COUNT(id) as num_users FROM users');
         users = fetch(get_users);
         close(get_users);
          
         %  It is stored in our variable num_users
         num_users = users.Data;
         
         % We initialize the matices to zero, giving the right dimensions
         Y=zeros(num_films,num_users);
         R=zeros(num_films,num_users);
         
         % Once we have both matices, we fill them with data from the
         % database
         
         % We get the data from the table and sort them according to
         % id_user, so that the data is correct
         get_ids = exec(conn,'SELECT id_user FROM user_score ORDER BY id_user');
         ids = fetch(get_ids);
         close(get_ids);
         id_users=ids.Data;
         
         get_idfilms = exec(conn,'SELECT id_movie FROM user_score ORDER BY id_user');
         ids_f = fetch(get_idfilms);
         close(get_idfilms);
         id_films=ids_f.Data;
         
         get_scores = exec(conn,'SELECT score FROM user_score ORDER BY id_user');
         sco = fetch(get_scores);
         close(get_scores);
         scores=sco.Data;
         
         % We fill the matrices Y, R by means of a for loop, with the data
         % received.
         for i=1:length(id_users)
           Y(id_users(i,1),id_films(i,1))=scores(i,1);          
           R(id_users(i,1),id_films(i,1))=1;   
         end
         
         % Finally, we create the matrix movieList, which can be generated
         % by means of the data coming from the query.
         get_mL = exec(conn,'SELECT id,title FROM movie');
         mL = fetch(get_mL);
         close(get_mL);
         movieList=mL.Data;

         
     end
        
     % Finallt we close the connection with the database.
     close(conn);
 
 end