function updateRecommendation(id, predictions)

     bbdd='ai57';
     user='root';
     pass='1234';
    
     % Connect with the database
     conn = database(bbdd,user,pass);
     
     % If conn.Message is empty: no error, we have connected
     if (isempty(conn.Message)) 
         
         % First, we need to create a matrix with the predictions received
         % sorted in descendant order to choose the 10 best.
         [n_prediction,n_id] = sort(predictions, 'descend');
         
         % Once it is done, we separate both matrices in vectors and we
         % take just the 10 first options.
         v_predictions = n_prediction(1:10);
         v_ids = n_id(1:10);
         
         % Once we have the predictions prepared and sorted, we have to
         % insert them in the database to be consulted from php. We check
         % there are no registered data from the user and then insert all
         % the data of the recommendation.
         str_id=int2str(id);
         order=strcat('SELECT COUNT(user_id) FROM recs WHERE user_id =', str_id);
         check_records = exec(conn,order);
         records = fetch(check_records);
         close(check_records);
         
         % If records = 0, it means there were no previous records.
         % Otherwise, we need to remove them.
         if (records.Data ~= 0)
              remove=strcat('DELETE FROM recs WHERE user_id=', str_id);
              perform_remove = exec(conn,remove);
              close(perform_remove);
         end
         
         % If we are sure that in the table there are not any data from
         % the user, we insert recommendations using 'fastinsert'.

         % The syntax is: fastinsert(conn,table,name of the fields,data)
         table='recs';
         name_fields={'user_id','movie_id','rec_score','time'};

         for j=1:length (v_predictions)
                data={id, v_ids(1,j), v_predictions(1,j), datestr(now) };
                fastinsert(conn, table, name_fields, data);
         end
                % Finally, we close the connection
                close(conn);
     end
end