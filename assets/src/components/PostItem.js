import React from "react";
import { Link } from "react-router-dom";

const PostItem = ({content}) => {    
  return (
    <div className="card">      
      <div className="card-body">
        <h5 className="card-title">{content.title}</h5>                
        <Link to={`/posts/${content.id}`} className="btn btn-pimary"> Ver más</Link>        
      </div>
    </div>
  );
};

export default PostItem;
