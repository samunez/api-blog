import React from "react";
import PostItem from "./PostItem";

const PostList = ({ posts }) => {
  console.log(posts);
  return (
    <div className="container">
      <h1>List of posts</h1>
      <div>
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
