import React from 'react'
import { useParams } from 'react-router-dom'

const PostDetail = ({posts}) => {
  const id = useParams().id
  const post = posts.find(n => n.id === String(id)) 
  return (
    <div>
        <h1>{post.title}</h1>
        <div>
            {post.body}
        </div>
        <div>{post.author.name}</div>
    </div>
  )
}

export default PostDetail