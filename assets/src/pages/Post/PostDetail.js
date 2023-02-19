import React from "react";
import { Link, useParams } from "react-router-dom";

const PostDetail = ({ posts }) => {
  const id = useParams().id;
  const post = posts.find((n) => n.id === String(id));

  const linkStyle = {
    margin: "1rem",
    textDecoration: "none",
    color: "#636464",
  };

  return (
    <div className="card">
      <Link style={linkStyle} to={`/`}>
        Ir atras
      </Link>
      <div className="card-body">
        <h1 className="card-title">{post.title}</h1>
        <p className="card-text">{post.body}</p>
        <blockquote className="blockquote">
          <footer className="blockquote-footer">{post.author.name}</footer>
        </blockquote>
      </div>
    </div>
  );
};

export default PostDetail;
