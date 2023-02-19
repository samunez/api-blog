import React from "react";
import { Link } from "react-router-dom";

const PostItem = ({ content }) => {
  const urlimage = "https://mdbcdn.b-cdn.net/img/new/standard/city/041.webp";
  return (
    <div className="col">
      <div className="card box-shadow mb-3">
        <img src={urlimage} className="card-img-top"
          alt="Hollywood Sign on The Hill" />
        <div className="card-body">
          <h5 className="card-title">{content.title}</h5>
          <Link to={`/posts/${content.id}`}>
            <button type="button" className="btn btn-secondary">
              Ver más
            </button>
          </Link>
        </div>
      </div>
    </div>
  );
};

export default PostItem;
