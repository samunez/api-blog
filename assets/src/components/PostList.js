import React from "react";
import PostItem from "./PostItem";

const PostList = ({ posts }) => {  
  
  return (
    <div className="container">      
      <div className="row row-cols-1 row-cols-md-2 g-4">
        {posts.map((post) => (          
          <PostItem 
            key={post.id}
            content={post}
          />
        ))}
      </div>
    </div>
  );
};
export default PostList;
